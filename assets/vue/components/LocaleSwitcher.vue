<template>
    <button v-if="position === 'absolute'" @click="switchLang" type="button" class="btn btn-dark position-absolute m-2">
        {{ $t(`lang.${$i18n.locale}`) }}
    </button>
    <div v-else-if="position === 'navbar'" class="nav-item text-nowrap">
        <a class="nav-link px-3" @click="switchLang" href="#">{{ $t(`lang.${$i18n.locale}`) }}</a>
    </div>
</template>

<script setup>
    import { useI18n } from 'vue-i18n';

    const { t, locale } = useI18n({ useScope: 'global' });

    function switchLang() {
        locale.value = (locale.value === 'en') ? 'he' : 'en';
        document.getElementsByTagName('html')[0].setAttribute('dir', (locale.value === 'en') ? 'ltr' : 'rtl');
        document.getElementsByTagName('html')[0].setAttribute('lang', locale.value);
    }

    defineProps({
        position: String
    });
</script>