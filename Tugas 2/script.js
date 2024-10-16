let editingTask = null;

function addTask() {
    const taskInput = document.getElementById('new-task');
    const taskText = taskInput.value.trim();

    if (taskText === '') {
        alert('Please enter a task!');
        return;
    }

    if (editingTask) {
        editingTask.querySelector('.task-text').innerText = taskText;
        editingTask.classList.remove('editing');
        editingTask = null;
    } else {
        const taskList = document.getElementById('task-list');

        const li = document.createElement('li');
        const span = document.createElement('span');
        span.classList.add('task-text');
        span.innerText = taskText;

        const div = document.createElement('div');
        div.classList.add('task-actions');

        const editButton = document.createElement('button');
        editButton.innerText = 'Edit';
        editButton.classList.add('edit');
        editButton.onclick = () => editTask(li);

        const deleteButton = document.createElement('button');
        deleteButton.innerText = 'Delete';
        deleteButton.classList.add('delete');
        deleteButton.onclick = () => deleteTask(li);

        div.appendChild(editButton);
        div.appendChild(deleteButton);

        li.appendChild(span);
        li.appendChild(div);

        taskList.appendChild(li);
    }

    taskInput.value = '';
}

function deleteTask(taskElement) {
    taskElement.remove();
}

function editTask(taskElement) {
    const taskText = taskElement.querySelector('.task-text').innerText;
    const taskInput = document.getElementById('new-task');
    taskInput.value = taskText;
    editingTask = taskElement;
    taskElement.classList.add('editing');
}
