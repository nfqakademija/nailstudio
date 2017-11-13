set :application, 'nailstudio'
set :repo_url, '#'

set :deploy_to, '/home/nailstudio/'

set :archive_cache, true
set :branch, 'master'
set :scm, :rsync
set :exclude, ['.git', 'node_modules', 'web/app_dev.php']

set :linked_files, fetch(:linked_files, []).push('app/config/parameters.yml')
set :linked_dirs, fetch(:linked_dirs, []).push('var/logs')

# Defaults to :db role
set :migration_role, :db

# Defaults to the primary :db server
set :migration_servers, -> { primary(fetch(:migration_role)) }

# Defaults to false
# Skip migration if files in db/migrate were not modified
set :conditionally_migrate, true

