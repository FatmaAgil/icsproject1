<script setup>
import { Link } from '@inertiajs/vue3'
</script>
<template>
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <h1><a href="welcome.blade.php"></a> RecycleConnect</h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="/profile">Profile</a></li>
          <li><a class="nav-link scrollto " href="/events">Events & News</a></li>
          <li><a class="nav-link scrollto " href="/Community">Community</a></li>
          <li><a class="nav-link scrollto " href="/guide">Guide</a></li>
        

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  </template>
