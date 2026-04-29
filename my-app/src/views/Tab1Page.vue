<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Todo App</ion-title>
      </ion-toolbar>
    </ion-header>

    <ion-content class="ion-padding">

      <!-- Add Todo -->
      <ion-item>
        <ion-input v-model="newTitle" placeholder="New todo..." />
        <ion-button slot="end" @click="addTodo">Add</ion-button>
      </ion-item>

      <!-- Todo List -->
      <ion-list>
        <ion-item v-for="todo in todos" :key="todo.id">
          <ion-checkbox
            slot="start"
            :checked="todo.completed"
            @ionChange="toggleTodo(todo)"
          />
          <ion-label :style="todo.completed ? 'text-decoration: line-through' : ''">
            {{ todo.title }}
          </ion-label>
          <ion-button slot="end" color="danger" @click="deleteTodo(todo.id)">
            Delete
          </ion-button>
        </ion-item>
      </ion-list>

    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import axios from 'axios'
import {
  IonPage, IonHeader, IonToolbar, IonTitle, IonContent,
  IonList, IonItem, IonLabel, IonInput, IonButton, IonCheckbox
} from '@ionic/vue'

const API = import.meta.env.VITE_API_URL || 'http://localhost'

interface Todo {
  id: number
  title: string
  completed: boolean
}

const todos = ref<Todo[]>([])
const newTitle = ref('')

const fetchTodos = async () => {
  const res = await axios.get(`${API}/api/todos`)
  todos.value = res.data
}

const addTodo = async () => {
  if (!newTitle.value.trim()) return
  await axios.post(`${API}/api/todos`, { title: newTitle.value })
  newTitle.value = ''
  fetchTodos()
}

const toggleTodo = async (todo: Todo) => {
  await axios.put(`${API}/api/todos/${todo.id}`, { completed: !todo.completed })
  fetchTodos()
}

const deleteTodo = async (id: number) => {
  await axios.delete(`${API}/api/todos/${id}`)
  fetchTodos()
}

onMounted(fetchTodos)
</script>