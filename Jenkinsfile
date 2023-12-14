pipeline {
    agent none
    stages {
        stage('Build') {
            agent any
            steps {
                checkout scm
                apt install curl -y
                apt install php php-curl -y
            }
        }
    }
}