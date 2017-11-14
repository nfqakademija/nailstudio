server 'deploy.nfqakademija.lt', user: 'nailstudio', roles: %w{web}

after 'deploy:finishing', 'mycompany:migrations:migrate'