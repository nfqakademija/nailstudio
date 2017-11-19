set :application, 'nailstudio'
set :repo_url, '#'

set :deploy_to, '/home/nailstudio/'

set :archive_cache, true
set :branch, 'master'
set :scm, :rsync
set :exclude, ['.git', 'node_modules', 'web/app_dev.php']

set :linked_files, fetch(:linked_files, []).push('app/config/parameters.yml')
set :linked_dirs, fetch(:linked_dirs, []).push('var/logs')

before 'deploy:updated', 'symfony:doctrine:cache:clear_metadata'
before 'deploy:updated', 'symfony:doctrine:cache:clear_query'
before 'deploy:updated', 'symfony:doctrine:cache:clear_result'
after  'deploy:updated', 'symfony:doctrine:migrations'

set :symfony_doctrine_cache_clear_metadata_flags, '--env=prod'
set :symfony_doctrine_cache_clear_metadata_roles, :db
set :symfony_doctrine_cache_clear_query_flags, '--env=prod'
set :symfony_doctrine_cache_clear_query_roles, :db
set :symfony_doctrine_cache_clear_result_flags, '--env=prod'
set :symfony_doctrine_cache_clear_result_roles, :db
set :symfony_doctrine_migrations_flags, '--no-interaction --allow-no-migration'
set :symfony_doctrine_migrations_roles, :db