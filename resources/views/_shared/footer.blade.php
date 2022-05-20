<div class="app__footer text-center">
    <div>Powered by <strong>Hito</strong></div>
    <div title="Version" data-tooltip>{{ config('app.version') }}</div>
    @if(!empty(config('app.build_date')))
    <div title="Build date" data-tooltip>{{ \Carbon\Carbon::createFromTimestamp(config('app.build_date'))->format('Y-m-d H:i') }}</div>
    @endif
</div>
