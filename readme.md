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
- Python
- MySQL or MariaDB
- Visual Studio Code

Developed and tested on macOS. Should work on Linux, not sure about Windows.

Uses the following MySQL user: `bit_academy // bit_academy`

## Installing
```
composer global require robbplo/autopilot
```

## Usage
```
autopilot [repo_url]
```

## Supported Drivers
- Laravel
- Php web
- Php CLI
- Python
- Python with virtual environment
- Jupyter notebook
- Default

## Roadmap
- Expand drivers
  - Building your own framework backend
  - MySQL
- Improve CLI feedback: errors and info messages
- User configuration
  - Preferred editor
  - Port for servers
