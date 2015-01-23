# Set branche to staging
set :branch, :staging

# Include development dependencies
set :composer_install_flags, '--no-interaction --quiet --optimize-autoloader'

# Server settings
set :deploy_to, -> { "/var/apps/#{fetch(:application)}" }
server 'example.com', user: 'deploy', roles: %w{web app db}

# Tasks
namespace :deploy do

	desc 'Setup symlink'
	task :setup_symlink do
	  on roles(:app) do
	  	begin
  	    execute "ln -s #{deploy_to}/current/web #{deploy_to.sub '/apps', '/www'}"
      rescue
        error "Could not create symlink in /var/www/. You will have to create this manually."
      end
	  end
	end

	after :published, :setup_symlink

end
