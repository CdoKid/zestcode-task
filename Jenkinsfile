pipeline {
    agent none
    stages {
        stage('Build') {
            agent any
            steps {
                checkout scm
                composer install
                npm install
            }
        }
    }
}