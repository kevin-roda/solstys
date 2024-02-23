<template>
  <div class="rk_section_home">
    <div class="rk_sct_left">
      <div class="rk_container">
        <RouterLink to="/" class="rk_logo"
          ><img src="../assets/Logo.png" alt=""
        /></RouterLink>
        <div class="rk_separator"></div>
        <h1>Artisan <br />de votre<br />développement</h1>
        <div class="rk_arrow_circle">
          <span class="rk_arrow"></span>
          <span class="rk_circle"></span>
        </div>
        <p class="rk_text">
          {{ data.sectionLeft.text }}
        </p>
      </div>
      <div class="rk_left_txt">
        <p>Formations</p>
        <span></span>
        <p></p>
        <p>sur-mesure</p>
      </div>
      <RouterLink to="/tourisme" class="rk_home_btn">Tourisme </RouterLink>
      <div class="bottom_ctt"></div>
    </div>
    <div class="rk_sct_right">
      <RouterLink to="/formations" class="rk_home_btn"
        >Métiers<br />
        de bouche</RouterLink
      >
      <div class="rk_right_txt">
        <a @click="formActiv = true">Contact</a>
        <span></span>
        <a
          class="linkedin"
          target="_blank"
          href="https://www.linkedin.com/in/yann-soleilland-aa032a14/"
        >
          <figure>
            <img src="/linkedin-icon.svg" alt="logo linkedin" />
          </figure>
        </a>
      </div>
      <div class="bottom_ctt"></div>
      <div class="wrap_video">
        <video
          playsinline="playsinline"
          autoplay="autoplay"
          muted="muted"
          loop="loop"
        >
          <source :src="data.sectionRight.urlVideo" type="video/mp4" />
        </video>
      </div>
    </div>
    <Teleport to="main">
      <transition name="downup">
        <div v-if="formActiv" class="rk_contactform">
          <div class="rk_content">
            <div class="cross" @click="formActiv = false"></div>

            <form action="" @submit.prevent="handleSubmit">
              <div class="ctc_left">
                <h2>contact</h2>
              </div>
              <p>
                Nous vous invitons à remplir le formulaire de contact suivant
                pour toute demande d’information ou de devis. Nous vous
                répondrons dans les plus brefs délais.
              </p>
              <div class="rk_left">
                <input
                  v-model="form.nom"
                  required
                  type="text"
                  name="nom"
                  placeholder="Nom*"
                />
                <input
                  v-model="form.email"
                  required
                  type="text"
                  name="email"
                  placeholder="Adresse mail*"
                />

                <input
                  type="text"
                  name="entreprise"
                  placeholder="Entreprise"
                  v-model="form.entreprise"
                />
                <input
                  type="text"
                  name="objet"
                  placeholder="Objet"
                  v-model="form.objet"
                />
              </div>
              <div class="rk_right">
                <input
                  type="text"
                  name="prenom"
                  placeholder="Prenom"
                  v-model="form.prenom"
                />
                <input
                  required
                  type="number"
                  name="numero"
                  placeholder="Numéro de téléphone*"
                  v-model="form.numero"
                />
                <input
                  type="text"
                  name="poste"
                  placeholder="Poste"
                  v-model="form.poste"
                />
                <select name="service" v-model="form.service" id="pet-select">
                  <option selected disabled>Service concerné</option>

                  <option value="tourisme">Tourisme</option>
                  <option value="metiers">Métiers de bouche</option>
                </select>
              </div>
              <textarea
                v-model="form.message"
                name="message"
                id=""
                cols="30"
                rows="10"
                placeholder="Votre message"
              ></textarea>
              <label for="submitBtn" class="submit">
                <input
                  type="submit"
                  id="submitBtn"
                  name="submitBtn"
                  value="Envoyer"
                />
                <div class="rk_arrow_circle light">
                  <span class="rk_arrow"></span>
                  <span class="rk_circle"></span>
                </div>
              </label>
            </form>
          </div>
        </div>
      </transition>
    </Teleport>
  </div>
</template>
<script setup>
import { ref } from "vue";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
const formActiv = ref(false);
const form = ref({
  nom: "",
  email: "",
  entreprise: "",
  objet: "",
  prenom: "",
  numero: "",
  poste: "",
  service: "",
  message: "",
});

const data = ref({
  sectionLeft: {
    text: " Nous favorisons votre développement grâce à l’apport de clients, le conseil et la formation.",
  },
  sectionRight: {
    urlVideo: "/accueil.mp4",
  },
});

const handleSubmit = () => {
  // Add basic form validation here, e.g., using libraries like vee-validate

  const endpoint = "/contact.php"; // Replace with your actual endpoint
  const headers = { "Content-Type": "application/json" };

  fetch(endpoint, {
    method: "POST",
    headers,
    body: JSON.stringify(form.value),
  })
    .then((response) => {
      if (response.status == 200) {
        formActiv.value = false;
        // Handle successful submission (e.g., clear form, display success message)
        const $toast = useToast();
        $toast.default("Votre message a bien été envoyé !", {
          position: "bottom",
          duration: 5000,
          // all of other options may go here
        });
        form.value = {
          nom: "",
          email: "",
          entreprise: "",
          objet: "",
          prenom: "",
          numero: "",
          poste: "",
          service: "",
          message: "",
        };
      } else {
        const $toast = useToast();
        let instance = $toast.error("Erreur lors de l'envoi du message", {
          position: "bottom",
          duration: 5000,
          // all of other options may go here
        });
        form.value = {
          nom: "",
          email: "",
          entreprise: "",
          objet: "",
          prenom: "",
          numero: "",
          poste: "",
          service: "",
          message: "",
        };
        // Handle error (e.g., display error message)
      }
    })
    .catch((error) => {
      // Handle network or other errors
      console.error("Error:", error);
    });
};
</script>
<style lang="scss" scoped>
$filet: #707070;
$orange: #fb8c24;
.rk_section_home {
  background-color: white;
  display: flex;
  justify-content: stretch;
  flex-wrap: wrap;
  max-width: 100vw;
  width: 100%;
  min-height: 770px;
  height: 100%;
  .rk_sct_left {
    min-height: 770px;
    height: 100vh;
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    position: relative;
    .rk_logo {
      img {
        max-width: 150px;
        margin: 40px 0;
      }
    }

    .rk_separator {
      width: 35px;
      height: 2px;
      background-color: black;
    }
    .rk_container {
      width: 50%;
      p {
        font-family: Futuralight;
        font-size: 23px;
      }
    }

    .rk_left_txt {
      display: flex;
      position: absolute;
      left: 0;
      top: 50%;
      align-items: end;
      transform: rotate(-90deg) translatey(-80px);

      span {
        height: 1px;
        background-color: #000000;
        width: 80px;
        margin: 0 10px 7px;
      }
      p {
        margin: 0;
        font-family: Futuralight;
        font-size: 18px;
        text-transform: uppercase;
        color: black;
        text-decoration: none;
        transition: all 0.4s;
      }
    }

    .rk_home_btn {
      background-color: #000000;
      left: 25%;
      &::after {
        content: "01";
      }
    }
  }
  > div {
    &:after {
      content: "";
      height: 100vh;
      border-right: solid 1px $filet;
      width: 1px;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1;
    }
    .bottom_ctt {
      height: 16%;
      width: 100%;
      border-top: solid 1px $filet;
    }
  }
  .rk_sct_right {
    background-color: black;
    position: relative;
    width: 50%;
    min-height: 770px;
    height: 100vh;
    display: flex;
    align-items: end;
    overflow: hidden;
    .rk_right_txt {
      figure {
        padding: 8.5px 10px;
        border: solid 2px $orange;
        border-radius: 50%;
        transform: rotate(-90deg) translatex(-25%);
        margin: 0;
        img {
          width: 20px;
        }
      }
    }
    > * {
      z-index: 1;
    }
    a {
      cursor: pointer;
    }
    .rk_home_btn {
      background-color: white;
      color: black;
      right: 25%;
      box-shadow: none;
      &:hover {
        border-color: #fb8c24;
        background-color: black;
        color: white;
        &::after {
          border-color: white;
        }
      }
      &::after {
        content: "02";
        border-color: #000000;
      }
    }

    .wrap_video {
      position: absolute;
      max-width: 100%;
      height: 100%;
      left: 0;
      top: 0;
      z-index: 0;
      video {
        height: 100%;
        width: 100%;
        object-fit: cover;
      }
    }
  }

  .rk_home_btn {
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-family: Futuralight;
    text-align: center;
    text-decoration: none;
    position: absolute;
    bottom: 16%;
    width: 65%;
    font-size: 35px;
    font-weight: 100;
    aspect-ratio: 3/1;
    transform: translateY(50%);
    box-shadow: 0px 7px 30px 0px #a7a2a2;
    border: solid 1px black;
    transition: all 0.4s;
    &:hover {
      border-color: #fb8c24;
      background-color: white;
      color: black;
      &::after {
        border-color: black;
      }
    }
    &::after {
      position: absolute;
      top: 10px;
      left: 15px;
      font-family: Italiana;
      font-size: 20px;
      border-bottom: solid 1px white;
    }
  }
}
@media screen and (max-width: 980px) {
  .rk_section_home {
    overflow: hidden;
    > div {
      &:after {
        height: 100%;
      }
      .bottom_ctt {
        height: 80px;
      }
    }

    .rk_sct_left {
      width: 100%;
      min-height: 728px;
      height: 100vh;
      position: relative;
      z-index: 5;
      overflow: visible;
      .rk_left_txt {
        transform: rotate(-90deg) translatey(-115px);
      }
      .rk_container {
        width: 65%;
      }
      .rk_home_btn {
        left: 50%;
        top: 0;
        transform: translate(-50%, max(115vh, 800px));
        aspect-ratio: 2/1;
      }
    }

    .rk_sct_right {
      min-height: 728px;
      width: 100%;
      height: 100vh;
      position: relative;
      z-index: 1;
      .rk_home_btn {
        left: 50%;
        transform: translatex(-50%);
        z-index: 5;
        bottom: 15vh;
        border: none;
        aspect-ratio: 2/1;
        box-shadow: 0px 7px 30px 0px #a7a2a2;
      }
    }
  }
}
@media screen and (max-width: 720px) {
  .rk_section_home > div:after,
  .bottom_ctt,
  .rk_separator .side {
    border-color: transparent !important;
  }

  .rk_right_txt,
  .rk_left_txt {
    display: none !important;
  }
  .rk_home_btn {
    width: 286px !important;
    height: 143px !important;
  }
}
</style>
