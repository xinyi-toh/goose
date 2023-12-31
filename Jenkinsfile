pipeline {
    agent any
    stages {
        stage('Checkout SCM') {
            steps {
                git branch: 'main', url: 'https://github.com/xinyi-toh/goose.git'
            }
        }

        stage('Set Script Permissions') {
            steps {
                script {
                    sh 'chmod +x install_docker_compose.sh'
                }
            }
        }

        stage('Install Docker Compose') {
            steps {
                script {
                    sh './install_docker_compose.sh'
                }
            }
        }

        stage('Deploy') {
            steps {
                sh 'pwd'
                sh 'ls'
                sh 'chmod 777 ./kill.sh'
                sh './docker-compose build'
                sh './docker-compose up'
                sh 'docker ps'
                input message: 'Finished using the web site? (Click "Proceed" to continue)'
                sh './kill.sh'
            }
        }

        stage('OWASP DependencyCheck') {
            steps {
				dependencyCheck additionalArguments: '--format HTML --format XML --suppression suppression.xml', odcInstallation: 'OWASP Dependency-Check Vulnerabilities'
            }
        }
    }
    post {
        success {
            dependencyCheckPublisher pattern: 'dependency-check-report.xml'
        }
    }
}
