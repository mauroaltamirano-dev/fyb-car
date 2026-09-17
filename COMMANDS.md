# Command interface

Use ./bin/kit for routine operations. Every command is implemented by scripts/project, the single command source of truth.

| Command | Availability | Notes |
| --- | --- | --- |
| help | Available | Delegates to the profile command when available. |
| install | Available | Installs local profile dependencies only when explicitly requested. |
| dev | Available | Delegates to the profile command when available. |
| stop | Available | Stops only the application process started by `./bin/kit dev`. |
| status | Available | Reports components, expected URLs, Git, runtime, and dependency state without secrets. |
| logs | Available | Prints the application log captured by `./bin/kit dev`. |
| test | Available | Delegates to the profile command when available. |
| check | Available | Delegates to the profile command when available. |
| build | Unavailable | Delegates to the profile command when available. |
| doctor | Available | Reports READY or NOT READY from relevant local checks. |

## Runtime and persistence

PostgreSQL is selected for durable shared data, but no local database service, credentials, or migration execution is created by generation.

## Package-manager correlation

The laravel profile uses its generated manifest as the runtime source of truth. Missing dependencies cause an actionable non-zero response rather than an implicit install.
