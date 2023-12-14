pipeline {
    agent none
    stages {
        stage('Build') {
            agent any
            steps {
                checkout scm
                sh 'sudo apt install curl php php-curl -y'
            }
        }
    }
}