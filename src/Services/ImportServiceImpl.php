<?php


namespace Hito\Platform\Services;


use Exception;
use Illuminate\Support\Str;
use Iterator;
use League\Csv\Reader;

class ImportServiceImpl implements ImportService
{
    private const CSV_INVALID_FILE = 'Your CSV file is invalid!';

    /**
     * ImportServiceImpl constructor.
     * @param UserService $userService
     * @param GroupService $groupService
     * @param DepartmentService $departmentService
     * @param ClientService $clientService
     * @param ProjectService $projectService
     * @param TeamService $teamService
     * @param RoleService $roleService
     */
    public function __construct(private UserService       $userService,
                                private GroupService      $groupService,
                                private DepartmentService $departmentService,
                                private ClientService     $clientService,
                                private ProjectService    $projectService,
                                private TeamService       $teamService,
                                private RoleService       $roleService)
    {
    }

    public function import(array $files): array
    {
        $errors[] = [];

        foreach ($files as $key => $value) {
            $csv = Reader::createFromPath($value);
            $csv->setHeaderOffset(0);

            try {
                $records = $csv->getRecords();
            } catch (Exception) {
                $errors[$key] = self::CSV_INVALID_FILE;
                continue;
            }

            switch ($key) {
                case 'users_file':
                    if ($this->importUsers($records)) {
                        $errors[$key] = self::CSV_INVALID_FILE;
                    }
                    continue 2;
                case 'groups_file':
                    if ($this->importGroups($records)) {
                        $errors[$key] = self::CSV_INVALID_FILE;
                    }
                    continue 2;
                case 'departments_file':
                    if ($this->importDepartments($records)) {
                        $errors[$key] = self::CSV_INVALID_FILE;
                    }
                    continue 2;
                case 'clients_file':
                    if ($this->importClients($records)) {
                        $errors[$key] = self::CSV_INVALID_FILE;
                    }
                    continue 2;
                case 'projects_file':
                    if ($this->importProjects($records)) {
                        $errors[$key] = self::CSV_INVALID_FILE;
                    }
                    continue 2;
                case 'teams_file':
                    if ($this->importTeams($records)) {
                        $errors[$key] = self::CSV_INVALID_FILE;
                    }
                    continue 2;
                case 'roles_file':
                    if ($this->importRoles($records)) {
                        $errors[$key] = self::CSV_INVALID_FILE;
                    }
                    continue 2;
                default:
                    $errors[$key] = self::CSV_INVALID_FILE;
                    break;
            }
        }

        return $errors;
    }

    private function importUsers(Iterator $records): bool
    {
        $error = false;

        foreach ($records as $record) {
            try {
                $this->userService->create(
                    $record['name'],
                    $record['surname'],
                    $record['email'],
                    $record['location'],
                    $record['timezone'],
                    $record['phone'],
                    $record['skype'],
                    $record['whatsapp'],
                    $record['telegram']
                );
            } catch (Exception) {
                $error = true;
            }
        }

        return $error;
    }

    private function importGroups(Iterator $records): bool
    {
        $error = false;

        foreach ($records as $record) {
            try {
                $this->groupService->create([
                    'name' => $record['name'],
                    'description' => $record['description']
                ]);
            } catch (Exception) {
                $error = true;
            }
        }

        return $error;
    }

    private function importDepartments(Iterator $records): bool
    {
        $error = false;

        foreach ($records as $record) {
            try {
                $this->departmentService->create([
                    'name' => $record['name'],
                    'description' => $record['description']
                ]);
            } catch (Exception) {
                $error = true;
            }
        }

        return $error;
    }

    private function importClients(Iterator $records): bool
    {
        $error = false;

        foreach ($records as $record) {
            try {
                $this->clientService->create($record['name'], $record['description'], $record['countryId']);
            } catch (Exception) {
                $error = true;
            }
        }

        return $error;
    }

    private function importProjects(Iterator $records): bool
    {
        $error = false;

        foreach ($records as $record) {
            try {
                $this->projectService->create($record['name'], $record['description']);
            } catch (Exception) {
                $error = true;
            }
        }

        return $error;
    }

    private function importTeams(Iterator $records): bool
    {
        $error = false;

        foreach ($records as $record) {
            try {
                $this->teamService->create($record['name'], $record['description']);
            } catch (Exception) {
                $error = true;
            }
        }

        return $error;
    }

    private function importRoles(Iterator $records): bool
    {
        $error = false;

        foreach ($records as $record) {
            try {
                $this->roleService->create($records['type'], $record['name'], $record['description']);
            } catch (Exception) {
                $error = true;
            }
        }

        return $error;
    }
}
