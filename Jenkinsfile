pipeline {
    agent none
    stages {
        stage('Build') {
            agent any
            steps {
                checkout scm
                sh 'php --ini'
                sh 'composer install --ignore-platform-req=ext-xmlwriter'
            }
        }
    }
}