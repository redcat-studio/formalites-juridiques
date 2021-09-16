<template>
  <Pricing
      title="Modifiez votre société"
      price="149€ H.T + frais légaux*"
      actionRouteName="edit-company"
      :services="services"
  >
    <template v-slot:price-annotation>
      *Frais de greffe 231€ et frais d’annonce légale 180€
    </template>
  </Pricing>
</template>

<script>
import Pricing from "@/components/Pricing";

export default {
  name: "EditCompanyPricing",
  components: {
    Pricing
  },
  data() {
    return {
      services: [
        'Dossier complet',
        'Enregistrement du dossier',
        'Traitement en 24h',
        'Assurance anti-rejet',
        'Assistance par téléphone et par mail tout au long de la procédure',
        'Changement et transfert de siège social',
        'Changement ou nomination du dirigeant (SARL, EURL, SCI)',
        'Changement et nomination de président (SAS ou SASU)',
        'Changement d’objet social',
        'Changement ou le rajout d’une activité',
        'Changement de dénomination sociale',
        'Déclaration relative aux bénéficiaires effectifs',
        'Changement de nom commercial',
        'Cession de parts',
        'Cession d’actions',
        'Changement de votre enseigne',
        'Changer le statut juridique d’une société',
        'Augmentation de capital',
        'Réduction de capital',
        'Changement d’adresse personnelle',
        'Changement de dénomination sociale',
        'Changement de l’exercice social',
        'Autres modifications statutaires',
      ]
    }
  }
}
</script>
