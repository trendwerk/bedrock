# Set branche to staging
set :branch, :staging

# Server settings
set :deploy_to, -> { "/var/apps/#{fetch(:application)}" }
server 'example.com', user: 'deploy', roles: %w{web app db}
