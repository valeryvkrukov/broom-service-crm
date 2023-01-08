<template>
    <div class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <Header />
    </div>
    <div class="container-fluid">
        <div class="row">
            <Sidebar />
            <Body />
        </div>
    </div>
</template>

<script setup>
import Header from './Header';
import Sidebar from './Sidebar';
import Body from './Body';

</script>