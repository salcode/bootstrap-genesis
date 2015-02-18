#!/bin/bash

########################################
# Create Git Release
#
# Usage:
# ./release.sh
########################################

echo 'Create release';

# =============================================================================
# Generate latest version of files
# =============================================================================

# generated minified files
grunt prod

# generated unminified files
grunt sass:releaseUnmin
grunt uglify:releaseUnmin

# =============================================================================
# Switch to new repo for release
# =============================================================================

# delete branch release if it already exists
git branch -D release

# create fresh branch release
git checkout -b release

# =============================================================================
# Add compiled files to repo
# =============================================================================
# force add compiled files
git add -f css/style.css
git add -f css/style.min.css
git add -f js/javascript.js
git add -f js/javascript.min.js

# =============================================================================
# Delete this release.sh file from the repo
# =============================================================================
git rm release.sh

git commit -m 'add compiled files and remove release.sh script'

# =============================================================================
# Get the version number
# =============================================================================
while [ -z $version ]; do
	read -e -p "Version Tag (e.g. 0.6.1): " version

	if [ -z $version ]; then
		cecho "You must enter a Version Tag" red
	fi
done

# =============================================================================
# Publish the release
# =============================================================================

# tag the relase
git tag -a $version -m 'Stable version'

# Push tags to the repo
git push --tags

# =============================================================================
# Cleanup
# =============================================================================

# switch to master branch
git checkout master

# delete the release branch
git branch -D release
