<template>
  <Pricing
      title="Cédez votre société"
      price="149€ H.T + frais légaux*"
      actionRouteName="transfer-company"
      :services="services"
  >
    <template v-slot:price-annotation>
      * Frais de greffe, annonces légales, enregistrement aux impôts, taxe sur un éventuel boni de liquidation.
    </template>
  </Pricing>
</template>

<script>
import Pricing from "@/components/Pricing";

export default {
  name: "TransferCompanyPricing",
  components: {
    Pricing
  },
  data() {
    return {
      services: [
        'Traitement en 24h',
        'Rédaction du procès-verbal de dissolution',
        'Rédaction du procès-verbal de liquidation',
        'Faire enregistrer le PV d\'AG auprès du service des impôts',
        'Rédaction et publication des annonces légales',
        'Dépôt du dossier au Greffe',
        'Votre nouveau KBIS portant les mentions de radiation',
        'Assistance juridique illimitée',
        'Garantie anti-rejet',
        'Assistance par téléphone et par mail tout au long de la procédure',
      ]
    }
  }
}
</script>

<style scoped>

</style>
