<template>
    <div class="books">
        <div class="container">
            <div class="filters">
                <form @submit.prevent="getBooks">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" v-model="title" class="form-control">
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" name="author" id="author" v-model="author"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="isbn">ISBN (semicolon separated list)</label>
                                <input type="text" name="isbn" id="isbn" v-model="ISBN" class="form-control">
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <button class="btn btn-success w-50 mt-4">Search</button>
                            <button class="btn btn-danger w-25 mt-4 ms-2" type="reset" @click="reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-xl-8 offset-xl-2 mb-5" v-for="book in books"
                     v-if="books.length > 0 && books[0].title !== ''">
                    <div class="book bg-light p-4 mt-5 rounded">
                        <div class="row">
                            <div class="col-xl-9">
                                <h3 v-if="typeof book.title !== 'undefined'">{{ book.title.replaceAll('"', '') }}</h3>
                                <p>{{ book.description }}</p>
                                <p>{{ book.contributor }}</p>

                                <h4>ISBNs:</h4>
                                <ul>
                                    <li v-for="(isbn, index) in book.isbns" :key="index">
                                        <span v-if="typeof isbn.isbn10 !== 'undefined'"
                                              class="w-100 mb-4">ISBN 10: <strong>{{ isbn.isbn10 }}</strong></span>
                                        <br v-if="typeof isbn.isbn10 !== 'undefined'">
                                        <span v-if="typeof isbn.isbn13 !== 'undefined'">ISBN 13: <strong>{{
                                                isbn.isbn13
                                            }}</strong></span>
                                    </li>
                                </ul>

                                <div v-show="book.isHistoryRevealed && book.ranks_history.length > 0">
                                    <h4 class="mt-5">Historical Ranks</h4>
                                    <ul class="mb-5 p-0" style="list-style: none;">
                                        <li v-for="(rank, index) in book.ranks_history" :key="index">
                                            <ul class="my-4 p-0" style="list-style: none;">
                                                <li v-for="(value, key) in rank" :key="key">
                                                    {{ key }}: <strong>{{ value }}</strong>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <button class="btn btn-primary" type="submit"
                                        @click="book.isHistoryRevealed = !book.isHistoryRevealed"
                                        v-if="typeof book.ranks_history !== 'undefined' && book.ranks_history.length > 0">
                                    <span v-show="!book.isHistoryRevealed">See Rank History</span>
                                    <span v-show="book.isHistoryRevealed">Hide Rank History</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

export default {
    name: "Books",
    data() {
        return {
            author: '',
            ISBN: '',
            title: '',
            offset: 1,
            books: [
                {
                    isHistoryRevealed: false
                }
            ],
            totalResults: 0,
        }
    },
    watch: {
        author(newValue, oldValue) {
            if (newValue === oldValue) return
            // this.searchByAuthor()
        },
        title(newValue, oldValue) {
            if (newValue === oldValue) return
            // this.searchByTitle()
        },
        ISBN(newValue, oldValue) {
            if (newValue === oldValue) return
            // this.searchByISBN()
        }
    },
    mounted() {
        this.getBooks()
    },
    methods: {
        getBooks() {
            const params = new URLSearchParams();

            if (this.author.length > 3) {
                params.append('author', this.author)
            }

            if (this.title.length > 3) {
                params.append('title', this.title)
            }

            if (this.ISBN.length > 9) {
                params.append('isbn', this.ISBN)
            }

            axios.get('api/1/nyt/best-sellers', {
                params
            }).then(({data}) => {
                this.books = data.books.results
            })
        },
        reset() {

            this.author = ''
            this.ISBN = ''
            this.title = ''
            this.offset = ''
            this.books = [{isHistoryRevealed: false}]
        },
        searchByTitle() {
            if (this.title.length <= 3) {
                return
            }

            this.getBooks()
        },

        searchByAuthor() {
            if (this.author.length <= 3) {
                return
            }

            this.getBooks()
        },

        searchByISBN() {
            if (this.ISBN.length <= 9) {
                return
            }

            this.getBooks()
        }
    }
}
</script>

<style scoped>

</style>
