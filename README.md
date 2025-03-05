### 🐳 feat: setup Docker, Laravel, and Backpack
- Installed and configured Docker for containerized development.
- Set up a new Laravel project and integrated Backpack for admin panel functionality.

### 🗄️ feat(migration): create CreateTasksTable migration and Task model
- Created a migration file for the CreateTasksTable, defining the schema for the tasks table.
- Developed the Task model to interact with the tasks database table.

### 🚫 feat(crud): implement CRUD for unauthorized users
- Developed a basic CRUD interface for tasks that can be accessed by unauthorized users.
- Ensured proper validation and error handling for guest users.

### ✅ feat(crud): implement CRUD on Backpack for authorized users
- Created a full CRUD interface for tasks within the Backpack admin panel for authorized users.
- Implemented role-based access control to manage task operations securely.

## Running the Project Locally

To run the project locally, please follow these steps:

🚀 **Clone the Repository**  
First, you need to download or clone the repository. You can do this by running the following command in your terminal:

git clone https://github.com/TheBraveJunior/todo-app.git

🐳 **Start Docker Containers**  
Navigate to the project directory (created during the cloning process) and run the Docker containers using the following command:

cd todo-app
docker-compose up --build -d

This will set up the environment using the provided `Dockerfile` and `docker-compose.yml` files. The project files are located in the `project` folder and the server configuration (Nginx) is in the `server` folder.

🔄 **Access the App Container**  
Once the containers are running, access the app container with the following command:

docker exec -it app bash

🛠️ **Install Dependencies**  
Inside the app container, run the following command to install the necessary PHP dependencies:

composer install

📄 **Set Up Environment Variables**  
Next, create a `.env` file from the example provided:

cp .env.example .env

🔧 **Run Migrations**  
Still inside the app container, execute the migration command to set up the database:

php artisan migrate

🌐 **Access the Project**  
Finally, open your web browser and navigate to `http://localhost:8000/` to enjoy the project!
