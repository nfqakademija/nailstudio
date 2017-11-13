# Load DSL and Setup Up Stages
require 'ongr_deploy'

# Includes default deployment tasks
require 'capistrano/deploy'

# Include capistrano-rails
require 'capistrano/rails'
require 'capistrano/rvm'
require 'capistrano/bundler'
require 'capistrano/rails/migrations'
require 'capistrano/rails/assets'

# Load custom tasks from `app/tasks' if you have any defined
Dir.glob( 'app/tasks/*.rake' ).each { |r| import r }
