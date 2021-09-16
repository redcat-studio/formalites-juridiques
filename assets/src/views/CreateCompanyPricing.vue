<template>
  <Pricing
      title="Créez votre société"
      price="199€ H.T"
      :services="services"
  >
    <template v-slot:annotation>
      *Auprès de nos partenaires si vous le souhaitez. (Domiciliation de votre entreprise, création site internet)<br/>
      Nous travaillons avec des partenaires de qualité (comptables et professionnels de la création des sites internet)
    </template>
  </Pricing>
</template>

<script>
import Pricing from '@/components/Pricing'

export default {
  name: "CreateCompanyPricing",
  components: {
    Pricing
  },
  data() {
    return {
      title: '',
      services: [
        'Recherche rapide sur la dénomination',
        'Actes accomplis au nom de la société en formation (vérification)',
        'Attestation de domiciliation (groupe) ou de mise à disposition (dirigeant)',
        'Domiciliation (obtention*)',
        'Certificat du dépositaire (obtention)',
        'Lettre et attestation des commissaires aux comptes (obtention*)',
        'Liste des souscripteurs',
        'Procuration en vue de la signature des statuts',
        'Statuts et annexe (reprise des actes)',
        'Décisions de nomination (procès-verbal, acte sous signature privée)',
        'Extrait des décisions',
        'Déclaration de non-condamnation et de filiation',
        'Document relatif au bénéficiaire effectif (DBE)',
        'Procuration pour les formalités',
        'Publicité légale',
        'Dépôt au registre du commerce et des sociétés',
      ]
    }
  }
}
</script>
