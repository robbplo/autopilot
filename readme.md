# Autopilot - ALPHA RELEASE
_Frictionless reviewing_

Autopilot is a CLI tool which automates the project setup required for 
reviewing Bit Academy exercises. It clones a repository and discerns which 
type of project is contained. Based on this type, a set of preparation steps 
are executed and the application is served. The code is then opened in your 
editor. Autopilot handles tedious setup, so you can focus on your review.

## Requirements
- Composer
- Php 7.3+
- MySQL or MariaDB


## Installing
```
composer global require robbplo/autopilot
```

## Usage
```
autopilot [repo_url]
```

## Supported Drivers
- Php web
- Laravel
- Default

## Roadmap
- Expand drivers
  - Php CLI
  - Building your own framework
- Improve CLI feedback: errors and info messages
- User configuration
  - Preferred editor
  - Port for servers
