pipeline {
	agent any
	stages {
		stage('Checkout SCM') {
			steps {
				git branch:'main', url: 'https://github.com/xinyi-toh/goose.git'
			}
		}

        stage('Deploy') {
			steps {
				sh 'pwd'
				sh 'ls'
                sh 'chmod 777 ./kill.sh'
                sh 'docker-compose build'
				sh 'docker-compose up'
                sh 'docker ps'
                input message: 'Finished using the web site? (Click "Proceed" to continue)'
                sh './kill.sh'
			}
		}

		stage('OWASP DependencyCheck') {
			steps {
				dependencyCheck additionalArguments: '--format HTML --format XML', odcInstallation: 'Default'
			}
		}
	}	
	post {
		success {
			dependencyCheckPublisher pattern: 'dependency-check-report.xml'
		}
	}
}