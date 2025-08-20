# open_news App

## Development environment setup

1. install [docker](https://docs.docker.com/get-started/#download-and-install-docker) and [docker-compose](https://docs.docker.com/compose/install/#install-compose)
2. clone the project repository
3. create a `.env` file from the `.env.example`
```shell
cp .env.example .env
```
4. from the project root directory run
```shell
docker-compose up -d
```
5. make sure that all containers are up and runninig
```shell
docker-compose ps
```
6. run docker exec to the application container.
```shell
docker exec -it open_news bash
```
7. Inside the application container install the needed dependencies
```shell
composer install
```
8. Inside the application container migrate the DB and seed the needed data as following
```shell
php artisan migrate
```
```shell
you can use alias "a" instead of "php artisan"
```

9. now you should be ready to go and the application should be accessable on port 80

### before adding any comment to git after the work
```
run: "composer phpstan" it will analysis the code
run: "composer pint" it will fix all styles 
```

## pgadmin
```shell
url: "http://localhost:5050/"
email: database@open_news.com
password: password
```

## horizon
```shell
first run: php artisan horizon
url: "http://localhost/horizon/dashboard"
```

## Hacks
### Applying Code Style Fixes in Commit

If you'd like to auto apply code style fixes before each commit, you can opt-in for using [git hooks](https://git-scm.com/docs/githooks) for this purpose.

**Warning: Please note that `pint` auto-fix feature might generate breaking changes.** You'll have to always check what got modified.

Change your local git hooks directory to [.githooks](.githooks):
``` sh
git config core.hooksPath .githooks
```

Now, a [pre-commit](.githooks/pre-commit) script will run before any new commit, which will run `pint` when there is PHP files in the commit.

---
