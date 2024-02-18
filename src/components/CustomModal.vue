<template>
    <transition name="modal">
      <div class="modal-mask modal-tryout-done">
        <div class="modal-wrapper">
          <div class="modal-container">
            <div class="modal-header">
              <h2>{{ header }}</h2>
              <h3>{{ subheader }}</h3>
              <button
                id="close-button"
                class="button-close"
                @click="$emit('close')"
              >
                X
              </button>

            </div>
  
            <div class="modal-body">
              <div id="score">
                Kamu menjawab
                <span class="highlight">
                  {{
                    Math.floor(
                      (score.correctlyAnsweredQuestions / score.allQuestions) *
                        100
                    )
                  }}% dengan total benar
                </span>
                <span class="highlight">
                  {{ score.correctlyAnsweredQuestions }} dari
                  {{ score.allQuestions }}
                </span>
                pertanyaan.
              </div>
            </div>
  
            <div class="modal-footer">
                <a href="/registrasi" class="btn-default">Daftar Sekarang</a>
                <button
                    id="play-again"
                    class="button-play"
                    @click="$emit('reload')"
                >
                    Coba Lagi
                </button>
              
            </div>
          </div>
        </div>
      </div>
    </transition>
  </template>
  
  <script>
  export default {
    props: {
      header: String,
      subheader: String,
      score: Object,
    },
  };
  </script>
  
  <style scoped>
  .modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
  }
  
  .modal-wrapper {
    display: table-cell;
    vertical-align: middle;
  }
  
  .modal-container {
    width: 90vw;
    max-width: 650px;
    margin: 0px auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
  }
  
  .modal-header {
    text-align: center;
    border-bottom: 0;
  }

  
  .modal-body {
    display: block;
    margin: 0 0 20px;
    line-height: 3rem;
    text-align: center;
    border-bottom: 0;
  }
  
  .modal-body > * {
    margin: 1rem 0;
    padding: 0.25rem 0;
  }
  
  .modal-footer {
    display: flex;
    justify-content: space-between;
    border-top: 0;
  }
  
  /*
   Modal Transition
   */
  
  .modal-enter {
    opacity: 0;
  }
  
  .modal-leave-active {
    opacity: 0;
  }
  
  .modal-enter .modal-container,
  .modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }

  
  .anchor-footer {
    color: black;
    text-decoration: none;
    cursor: default;
  }
  
  .button-footer:active,
  .button-footer:focus {
    outline: none;
  }
  
  .button-footer:hover {
    transform: scale(1.02);
  }
  
  #score {
    background-color: rgb(210, 200, 200);
    border-radius: 5px;
    box-shadow: 2px 3px 9px gray;
  }
  
  #chooseCategory {
    text-align: center;
  }
  </style>