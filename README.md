# CI/CD Challenge / Demo application

This repository contains the project used for my Github Actions
workshop at [https://spaceleiden.nl](https://spaceleiden.nl)

## Requirements

- Docker
- docker-compose
- A development environment
  - PHPStorm
  - Visual Studio Code
- A Github account
- DNS pointing from cicd.test to 127.0.0.1 (localhost)
  - Edit /etc/hosts on MacOS/Linux

## Getting started

The goal is to create a working github actions workflow from the starting
point: the `main` branch. Get started by first forking the repository using
the button on the top right.

Next up clone the forked repository, and set up the local environment

```bash
# Copy the example environment file
cp .env.example .env
# Start the local environment
docker-compose up
```

Now visit [cicd.test:8080](http://cicd.test:8080) to see your application!

## The challenge

I've created a starting workflow file in `.github/workflows/cicd.yml` with a
few steps predefined. This is your starting point. From here you can build out
the workflow file. Make sure to check out the github actions documentation for
how a workflow works, and check the Github Actions Marketplace for community
actions to use!

## The solution

If you get stuck, you can visit the solution branch. This branch will contain
the full workflow file with all steps to take, and descriptive names.

# Good luck!
