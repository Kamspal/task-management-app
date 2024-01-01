<template>
    <div>
        <div class="form-group">
            <h1>Task List</h1>
            <label for="project">Select Project:</label>
            <select
                v-model="selectedProject"
                @change="fetchTasks"
                class="form-control"
            >
                <option value="">Select Project</option>
                <option
                    v-for="project in projects"
                    :key="project.id"
                    :value="project.id"
                >
                    {{ project.name }}
                </option>
            </select>

            <draggable v-model="taskList" @end="updateTaskPriorities">
                <div v-for="(task, index) in taskList" :key="task.id">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Task Name</th>
                                <th>Priority</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ task.task_name }}</td>
                                <td>{{ index + 1 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </draggable>
        </div>
    </div>
</template>

<script>
import draggable from "vuedraggable";
import axios from "axios";

export default {
    components: {
        draggable,
    },
    props: ["tasks", "projects"],
    data() {
        return {
            taskList: this.tasks,
            selectedProject: "",
        };
    },
    methods: {
        updateTaskPriorities() {
            this.taskList.forEach((task, index) => {
                task.priority = index + 1;
            });

            // Call an API to update task priorities on the server
            axios
                .post("/task/update-priorities", { tasks: this.taskList })
                .then((response) => {
                    // Handle success if needed
                    console.log("Task priorities updated successfully");
                })
                .catch((error) => {
                    // Handle error if needed
                    console.error("Error updating task priorities:", error);
                });
        },
        fetchTasks() {
            let endpoint = "/project/tasks";
            if (this.selectedProject) {
                endpoint += "?project_id=" + this.selectedProject;
            }
            // Fetch tasks from the server
            axios
                .get(endpoint)
                .then((response) => {
                    this.taskList = response.data.tasks;
                    //console.log(response);
                })
                .catch((error) => {
                    // Handle error if needed
                    console.error("Error fetching tasks:", error);
                });
        },
    },
    mounted() {
        this.fetchTasks();
    },
};
</script>

<style scoped>
/* Add your component styles here */
</style>
