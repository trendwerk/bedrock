set :application, 'my_app_name'
set :repo_url, 'git@example.com:me/my_repo.git'

# Branch
set :branch, :master

# Deployment folder
set :deploy_to, -> { "/var/www/#{fetch(:application)}" }

# Log level
set :log_level, :info

# Linked files and directories for /shared/
set :linked_files, fetch(:linked_files, []).push('.env')
set :linked_files, fetch(:linked_files, []).push('web/.htaccess')
set :linked_dirs, fetch(:linked_dirs, []).push('web/app/uploads')

# Deploy tasks
namespace :deploy do

  desc 'Restart application'
  task :restart do
    on roles(:app), in: :sequence, wait: 5 do
      # Your restart mechanism here, for example:
      # execute :touch, release_path.join('tmp/restart.txt')
    end
  end

  # after :publishing, :restart

end
