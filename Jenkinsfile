pipeline {
    agent none
    stages {
        stage('Build') {
            agent any
            steps {
                checkout scm
                sh 'composer install --ignore-platform-reqs'
                sh 'npm install'
            }
        }
    }
}