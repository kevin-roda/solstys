<template>
  <div class="rk_blackpage">
    <RouterLink to="/" class="rk_home_btn">
      <div class="rk_arrow_circle light reverse">
        <span class="rk_arrow"></span>
        <span class="rk_circle"></span></div
    ></RouterLink>
    <section class="first">
      <RouterLink to="/" class="rk_home_btn_logo">
        <figure>
          <img src="/logo-blanc.png" alt="logo solstys" />
        </figure>
      </RouterLink>
      <h1>Mentions légales</h1>
    </section>

    <section class="rk_middle_sct">
      <div class="rk_one">
        <p>
          Identité : SOLSTYS,<br />
          société par actions simplifiée au capital social de 4500 €,<br />
          dont le siège social est situé au 14 ALLEE DU VALLON 73420
          DRUMETTAZ-CLARAFOND,<br />
          immatriculée au Registre du Commerce et des Sociétés de Chambery sous
          le numéro 821 101 300,<br />
          TVA intracommunautaire FR 67 821101300 représentée par M. Yann
          Soleilland agissant et ayant les pouvoirs nécessaires en tant que
          président.<br /><br />
          Coordonnées mail contact@solstys(.)net <br />Ce site est hébergé
          par<br />
          OVH SAS 2 rue Kellermann - 59100 Roubaix - France <br />Numéro de
          téléphone : 0820698765<br /><br />
          Directeur de la publication : <br />Yann SOLEILLAND
          contact@solstys(.)net
        </p>
      </div>
    </section>

    <div class="rk_separator_line"><div class="side"></div></div>
    <div class="rk_right_txt">
      <a @click="formActiv = true">Contact</a>
      <span></span>
      <a
        class="linkedin"
        target="_blank"
        href="https://www.linkedin.com/in/yann-soleilland-aa032a14/"
      >
        <figure>
          <img src="/linkedin-icon.svg" alt="" />
        </figure>
      </a>
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
    <Teleport to="body" v-if="ready">
      <footer>
        <div class="rk_up">
          <figure>
            <img src="/logo-blanc.png" alt="logo solstys" />
          </figure>
          <div class="rk_contact" @click="formActiv = true">
            <h3 class="orange">Nous contacter</h3>
            <div class="rk_arrow_circle light">
              <span class="rk_arrow"></span>
              <span class="rk_circle"></span>
            </div>
          </div>
          <a
            class="linkedin"
            target="_blank"
            href="https://www.linkedin.com/in/yann-soleilland-aa032a14/"
          >
            <figure>
              <img src="/linkedin-icon.svg" alt="" />
            </figure>
          </a>
        </div>
        <hr />
        <div class="rk_down">
          <div class="left">
            <RouterLink to="/mentions-legales"> Mentions légales </RouterLink>

            |
            <form method="get" target="_blank" action="/CGV.pdf">
              <button type="submit">CGV</button>
            </form>
          </div>
          <div class="right">
            <a target="_blank" href="https://angeliqueemonet.com/"
              >Création graphique & </a
            ><a target="_blank" href="http://owlf.school/">développement</a>
          </div>
        </div>
      </footer>
    </Teleport>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

const formActiv = ref(false);
const ready = ref(false);

setTimeout(() => {
  ready.value = true;
}, 400);

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
$maincolor: black;
$oposcolor: white;
$orange: #fb8c24;
$filet: #707070;
.rk_blackpage {
  overflow: hidden;
  min-height: 100vh;
  background-color: $maincolor;
  max-width: 100vw;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  h1 {
    color: $oposcolor;
  }
  h2 {
    color: $oposcolor;
    margin: 100px 0 0 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  h3:not(.orange) {
    color: $oposcolor;
    font-family: Futuralight;
    text-transform: uppercase;
    font-weight: 300;
    &::before {
      content: "";
      background-color: $oposcolor;
      width: 80px;
      display: inline-block;
      height: 1px;
      margin: 0 10px 0 40px;
    }
  }

  section {
    padding-top: 100px;
    max-width: 980px;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    &.first {
      padding-top: 50px;
    }
    &:not(.noLine) {
      border-right: solid 1px $filet;
      border-left: solid 1px $filet;
    }

    &.rk_middle_sct {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    &.noLine {
      padding-bottom: 100px;

      padding-top: 0;
      h2 {
        text-align: center;
        display: block;
        margin-bottom: 40px;
      }
      h3 {
        color: $orange;
        font-family: Italiana;
        font-weight: 300;
        font-size: 35px;
        margin-top: 50px;
      }

      .three_col {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;

        > div {
          position: relative;
          flex: 0 0 auto;
          width: 31%;
          &::before {
            color: $oposcolor;
            font-family: Italiana;
            display: block;
            content: attr(numero);
            position: absolute;
            top: 0;
            left: 0;
          }
          &::after {
            background-color: $oposcolor;
            display: block;
            width: calc(80% - 30px);
            max-width: 200px;
            height: 1px;
            position: absolute;
            top: 13px;
            left: 30px;
            content: "";
          }
        }
        p {
          color: $oposcolor;
          font-family: Futuralight;
          font-size: 16px;
          line-height: 16px;
        }
      }
      @media screen and (max-width: 980px) {
        .three_col {
          justify-content: center;
          > div {
            width: 50%;
            margin: 20px;
          }
        }
      }
      @media screen and (max-width: 720px) {
        .three_col {
          > div {
            width: 70%;
          }
        }
      }
    }

    .rk_one,
    .rk_two {
      position: relative;
      z-index: 1;

      p {
        font-family: Futuralight;
        color: $oposcolor;
        font-size: 22px !important;
        padding: 40px 0;
        margin: 0;
        position: relative;
        &:nth-child(3):before {
          position: absolute;
          top: 0;
          content: "";
          background-color: $oposcolor;
          width: 80px;
          display: inline-block;
          height: 1px;
        }
      }
    }

    &.noLineCenter {
      padding-bottom: 100px;
      position: relative;

      &.nRight {
        border-right: 0;
      }

      .downloads {
        display: flex;
        width: 150%;
        flex-wrap: nowrap;
        form {
          display: inline-block;
          width: 26%;
          max-width: 26vw;
          margin: 20px 30px 20px 0;
          button {
            display: block;
            height: 100%;
            background-color: transparent;
            border: solid 1px $orange;
            border-radius: 25px;
            color: $orange;
            padding: 10px;
            width: 100%;
            transition: all 0.4s;
            cursor: pointer;

            &:hover {
              background-color: $orange;
              color: $maincolor;
            }
          }
        }
      }
      img {
        max-width: 300px;
      }
    }
  }

  .rk_separator_line {
    width: 100%;
    height: 1px;
    border-top: solid 1px $filet;
  }
  section,
  .rk_separator {
    position: relative;
    &:not(.noLine, .noLineCenter) {
      &:after {
        content: "";
        height: 100%;
        border-right: solid 1px $filet;
        width: 1px;
        position: absolute;
        left: 50%;
        top: 0;
        transform: translateX(-50%);
        z-index: 0;
      }
    }
  }
  .rk_right_txt {
    position: fixed;
    top: 50%;
    transform: rotate(90deg) translatey(-80px);
    a {
      cursor: pointer;
    }
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
  .rk_home_btn {
    position: fixed;
    top: 100px;
    left: 60px;
    z-index: 3;
  }
}
@media screen and (max-width: 1530px) {
  .rk_blackpage {
    .rk_middle_sct {
      .rk_one,
      .rk_two {
        h4 {
          font-size: 40px;
        }
        .rk_deco_b {
          display: inline-block;
        }
      }

      .rk_two {
        width: 50%;
        margin-left: 50%;
        transform: translateX(0%);
        display: flex;
        flex-direction: column;
        align-items: start;
        h3 {
          margin-left: 0px;
        }
        ul {
          direction: ltr;
          padding-right: 15px;
          li {
            padding-right: 10px;
          }
        }
        p.orange {
          text-align: left;
        }
        .upSplit {
          width: 100%;
        }
        h4 {
          text-align: left;
          &:nth-child(3):before {
            right: 0;
          }
        }
      }
    }
  }
}
@media screen and (max-width: 1280px) {
  .rk_blackpage {
    h2 {
      font-size: 50px;
      line-height: 35px;
    }
    .rk_home_btn {
      left: 5px;
    }
    .rk_right_txt {
      transform: rotate(90deg) translatey(-138px);
    }
    .rk_middle_sct {
      .rk_one,
      .rk_two {
        p {
          font-size: 40px;
        }
      }
      .rk_one {
        .rk_deco_b {
          margin-left: 180px;
        }
      }
    }
  }
}

@media screen and (max-width: 1000px) {
  .rk_blackpage {
    padding: 0 60px;
    align-items: start;
    section,
    .rk_separator {
      max-width: calc(100% - 120px);
      .rk_left_txt {
        display: none;
      }
    }
    .rk_separator_line {
      transform: translateX(-60px);
    }
    section.noLineCenter {
      align-items: center;
      &.nRight {
        align-items: start;
        .content {
          margin-top: 40px;
          width: 100%;
          p {
            text-align: left;
          }
        }
      }
      h2 {
        margin-top: 0;
        justify-content: center;
      }
      p {
        text-align: center;
      }
      .downloads {
        width: 100%;
        flex-direction: column;
        align-items: center;
        form {
          margin-right: 0;
          max-width: 210px;
          width: 220px;
        }
      }
      img {
        width: 80%;
      }
    }
  }
}

@media screen and (max-width: 720px) {
  section,
  section:after,
  .rk_separator_line,
  .rk_separator,
  .rk_separator:after,
  .nRight:after,
  .rk_separator .side {
    border-color: transparent !important;
  }

  .nRight:after {
    background-color: transparent !important;
  }
  .rk_arrow_circle + .rk_deco_b {
    margin-left: 60px !important;
    padding-left: 15px;
    span {
      font-size: 42px;
      line-height: 50px;
    }
    &::after {
      bottom: inherit;
      top: 0;
    }
  }
  .rk_blackpage {
    .rk_right_txt {
      display: none;
    }
    h2 {
      flex-direction: column;
    }

    .rk_middle_sct {
      padding-top: 0;
      h3 {
        padding-left: 10px;
        &:not(.orange)::before {
          display: none;
        }
      }
      .rk_one,
      .rk_two {
        width: 100%;
        margin-left: 0%;
        align-items: start;
        p {
          width: 100%;
          text-align: left;
          &:before {
            right: inherit;
            left: 0;
          }
        }
        .rk_deco_b {
          margin-left: 120px;
          display: inline-block;
          img {
            width: 120px;
            transform: translateX(-120px) translateY(10px);
          }
        }
        h4 {
          font-size: 55px;
        }
        .upSplit {
          h3 {
            padding-left: 0;
          }
        }
      }
      .rk_deco_b {
        position: relative;
        margin-left: 60px;
        &:before {
          display: block !important;
          content: "";
          width: 120px;
          height: 1px;
          background-color: white;
          position: absolute;
          bottom: 4px;
          left: 0;
          transform: translateX(-160px) !important;
        }
        img {
          transform: translateX(-100%) translateY(-15px);
        }
      }
    }
    section.noLine {
      h2 {
        font-size: 50px !important;
        margin-top: 0;
      }
      .three_col > div {
        width: 100%;
      }
    }
    section {
      .rk_left_txt {
        transform: rotate(-90deg) translatey(calc(-50vw - 30px));
      }
    }
    .noLineCenter {
      padding-top: 0;
      .content {
        width: 100% !important;

        flex-direction: column;

        > div {
          margin-bottom: 20px;
          width: 100% !important;
          p {
            text-align: left;
          }
        }
      }
    }
    section.noLine .three_col > div::after {
      width: calc(100% - 30px);
      max-width: inherit;
    }
  }
  .rk_home_btn {
    display: none;
  }
}
</style>
