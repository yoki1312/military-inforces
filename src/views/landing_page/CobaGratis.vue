<template>
    <div class="coba-gratis">
        <Header />
        <Navbar />
    
        <section class="head-breadcrumb">
          <div class="container">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <b-breadcrumb :items="items"></b-breadcrumb>
              </div>
            </div>
          </div>
        </section>
        <section class="body-skedinasan">
          <div class="container">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Coba Gratis</h1>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <quiz @quiz-completed="handleQuizCompleted" :key="quizKey" />
                <custom-modal
                  v-show="showModal"
                  header="Selamat!!!!"
                  subheader="Kamu Telah Menyelesaikan Soal TryOut Kami"
                  :score="score"
                  @reload="updateQuiz"
                  @close="showModal = false"
                />
              </div>
            </div>
          </div>
        </section>
    
        <Footer />
      </div>
    </template>
    
    <script>
    // @ is an alias to /src
    import Header from '@/components/landing_page/Header.vue'
    import Navbar from '@/components/landing_page/Navbar.vue'
    import Footer from '@/components/landing_page/Footer.vue'

    import CustomModal from "@/components/CustomModal.vue";
    import Quiz from "@/components/Quiz.vue";
    
    export default {
      name: 'Coba Gratis',
      components: {
        Header,
        Navbar,
        Footer,
        Quiz, 
        CustomModal
      },
      data() {
        return {
          items: [
            {
              text: 'Beranda',
              href: '/'
            },
            {
              text: 'Coba Gratis',
              active: true
            }
          ],
          quizKey: 0,
          showModal: false,
          score: {
            allQuestions: 0,
            answeredQuestions: 0,
            correctlyAnsweredQuestions: 0,
          },
        }
      },
      methods: {
        handleQuizCompleted(score) {
          this.score = score;
          this.showModal = true;
        },
        updateQuiz() {
          this.showModal = false;
          this.quizKey++;
        },
      },
    }
    </script>
    