<template>
  <div>
    <form action="#" method="POST" @submit.prevent="addBook">
      <div>
        <label>Title</label>:
        <input type="text" name="title" id="title" v-model="title" />
      </div>
      <div>
        <label>Author</label>:
        <input type="text" name="author" id="author" v-model="author" />
      </div>
      <div>
        <label>Image</label>:
        <input type="text" name="image" id="image" v-model="image" />
      </div>
      <div>
        <label>Description</label>:
        <input type="text" name="description" id="description" v-model="description" />
      </div>
      <div>
        <label>Link</label>:
        <input type="text" name="link" id="link" v-model="link" />
      </div>
      <div>
        <label>
          <input type="checkbox" name="featured" v-model="featured" /> Featured
        </label>
      </div>
      <div>
        <label>Category</label>
        <ApolloQuery :query="require('@/graphql/queries/Categories.gql')">
          <!-- The result will automatically updated -->
          <template slot-scope="{ result: { data, loading }, isLoading }">
            <!-- Some content -->
            <div v-if="isLoading">Loading...</div>
            <select v-model="category_id" v-else>
              <option
                :value="category.id"
                v-for="category of data.categories"
                :key="category.id"
              >{{ category.name }}</option>
            </select>
          </template>
        </ApolloQuery>
      </div>

      <div>
        <button type="submit">Enviar</button>
      </div>
    </form>
  </div>
</template>

<script>
import addBook from '@/graphql/mutations/AddBook.gql';

export default {
    
  data() {
    return {
      title: "",
      author: "",
      image: "",
      description: "",
      link: "",
      featured: false,
      category_id: 1
    };
  },
  methods: {
    addBook() {
      this.$apollo.mutate({
          // Query
          mutation: addBook,
          // Parameters
          variables: {
            title: this.title,
            author: this.author,
            image: this.image,
            link: this.link,
            description: this.description,
            featured: this.featured,
            category: this.category_id
          }
        }).then(data => {
          console.log(data);
          this.$router.push('/');
        }).catch(error => {
          console.error(error);
        });
    }
  }
};
</script>