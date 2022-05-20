<?php

namespace Hito\Platform\View\Components;

use App\Enums\FileType;
use App\Enums\MediaVariant;
use App\Models\Media;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ShowMedia extends Component
{
    private Collection $mediaVariants;

    public function __construct(
        public Media|\Plank\Mediable\Media $media,
        public ?FileType $type = null,
        public ?MediaVariant $variant = null,
        public ?array $responsiveVariants = null,
        public ?string $alt = null,
        public ?string $title = null,
        public bool $autoScaling = true,
        public bool $lazyLoading = true
    ) {
        if (is_null($type)) {
            $this->type = FileType::tryFrom($this->media->aggregate_type);
        }
    }

    public function render()
    {
        $url = $this->media->getUrl();
        $this->mediaVariants = $this->media->getAllVariants();

        if ($this->media->aggregate_type === \Plank\Mediable\Media::TYPE_VIDEO) {
            if ($this->type === FileType::IMAGE) {
                $thumbnail = $this->media->findVariant(MediaVariant::THUMBNAIL->value);
                $url = $thumbnail?->getUrl();

                if (!is_null($this->variant) && $variants = $this->findVariants($this->variant)) {
                    $variant = array_shift($variants);
                    $url = $variant['url'];
                }
            }
        } elseif (!is_null($this->variant) && $variants = $this->findVariants($this->variant)) {
            $variant = array_shift($variants);
            $url = $variant['url'];
        }

        $variants = $this->getVariants();

        return view('hito::components.show-media', compact('url', 'variants'));
    }

    private function getVariants(): ?array
    {
        $autoscalingEnabled = $this->autoScaling && !is_null($this->variant);

        if (is_null($this->responsiveVariants) && !$autoscalingEnabled) {
            return null;
        }

        $allowedVariants = [
            MediaVariant::S,
            MediaVariant::M,
            MediaVariant::L,
            MediaVariant::XL,
        ];

        $variants = [];
        $selectedVariants = $this->responsiveVariants ?? [];

        if (is_null($this->responsiveVariants) && $autoscalingEnabled) {
            $currentVariantIndex = array_search($this->variant, $allowedVariants);

            for ($i = $currentVariantIndex + 1; $i < count($allowedVariants); $i++) {
                $selectedVariants[] = $allowedVariants[$i];
            }
        }

        foreach ($selectedVariants as $index => $parentVariant) {
            $childrenVariants = $this->findVariants($parentVariant);

            if (is_null($childrenVariants)) {
                continue;
            }

            foreach ($childrenVariants as $childVariant) {
                $query = is_int($index) ? $childVariant['query'] : $index;

                if (empty($query)) {
                    // Skip variant if media query is missing
                    continue;
                }

                $key = "{$childVariant['query']}-{$childVariant['format']}";
                $variants[$key] = [
                    ...$childVariant,
                    'query' => $query
                ];
            }
        }

        return count($variants) ? $variants : null;
    }

    private function findVariants(MediaVariant $variant): ?array
    {
        $childrenVariants = $variant->getChildren();

        if (is_null($childrenVariants)) {
            $childrenVariants = [$variant];
        }

        $data = [];
        foreach ($childrenVariants as $childVariant) {
            if ($modelVariant = $this->mediaVariants->get($childVariant->value)) {
                $data[] = [
                    'query' => $childVariant?->getQuery() ?? $variant->getQuery(),
                    'url' => $modelVariant->getUrl(),
                    'format' => $childVariant?->getFormat() ?? $variant->getFormat(),
                    'mimeType' => $childVariant?->getMimeType() ?? $variant->getMimeType()
                ];
            }
        }

        if (!count($data)) {
            return null;
        }

        return $data;
    }
}
