<template>
  <div class="book">
    <ApolloQuery :query="require('@/graphql/queries/Book.gql')" :variables="{ id: $route.params.id}">
      <!-- The result will automatically updated -->
      <template slot-scope="{ result: { data, loading }, isLoading }">
        <!-- Some content -->
        <div v-if="isLoading">Loading...</div>
        <div v-else>
          <div> {{ data.book.title }}</div>
          <div> {{ data.book.author }}</div>
          <img :src="`${data.book.image}`" alt="book cover">
          <router-link :to="`/books/${data.book.id}/edit`">Edit</router-link> | 
          <a href="#" @click.prevent="deleteBook">Delete</a>
        </div>
      </template>
    </ApolloQuery>
  </div>
</template>

<script>
import deleteBook from '@/graphql/mutations/DeleteBook.gql'

export default {
  methods: {
    deleteBook() {
      this.$apollo.mutate({
        mutation: deleteBook,
        variables : {
          id: this.$route.params.id
        }
      }).then(data => {
        console.log(data);
        this.$router.push('/');
      })
    }
  }
}
</script>