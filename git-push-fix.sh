#!/bin/bash

# Clean up any incomplete transfers
git gc --prune=now

# Configure git to handle large pushes
git config http.postBuffer 524288000
git config http.lowSpeedLimit 1000
git config http.lowSpeedTime 300

# Attempt to push with increased timeout
git push --verbose --progress origin HEAD || {
    echo "First attempt failed, retrying with different settings..."
    # Try alternative push method
    git config ssh.postBuffer 524288000
    GIT_TRACE=1 git push --verbose --progress origin HEAD
}
