pipeline {
    agent {
        docker {
            image 'node:20.9.0-alpine3.18' 
            args '-p 3000:3000'
        }
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Install Dependencies') {
            steps {
                script {
                    sh 'npm install'
                }
            }
        }

        stage('Build') {
            steps {
                script {
                    sh 'npm run build'
                }
            }
        }

        // stage('Deploy') {
        //     steps {
        //         script {
        //             // Your deployment steps go here
        //             // For example, you might deploy to a server or upload to a hosting service.
        //             // This will depend on your specific deployment setup.
        //         }
        //     }
        // }
    }

    // post {
    //     always {
    //         // Clean up steps go here if needed
    //     }
    // }
}
