<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

<nav class="bg-green-500 shadow-sm sticky-nav">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <a class="text-white font-bold text-xl" href="#">Gestion des interventions</a>
            <div class="flex items-center space-x-4 md:hidden">
                <button id="hamburger-btn" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path fill-rule="evenodd" d="M3 5h18a1 1 0 010 2H3a1 1 0 010-2zm0 8h18a1 1 0 010 2H3a1 1 0 010-2zm0 8h18a1 1 0 010 2H3a1 1 0 010-2z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <ul id="menu" class="hidden md:flex space-x-4">
                <li><a class="nav-link hover:bg-green-400 px-3 py-2 rounded text-white accueil" href="<?= base_url('contrats') ?>">Contrats</a></li>
                <li><a class="nav-link hover:bg-green-400 px-3 py-2 rounded text-white employe" href="<?= base_url('contrats/agc') ?>">Agences</a></li>
                <li><a class="nav-link hover:bg-green-400 px-3 py-2 rounded text-white solde" href="#">Rapports</a></li>
                <li><a class="nav-link hover:bg-green-400 px-3 py-2 rounded text-white historique" href="#">Notifications</a></li>
            </ul>
        </div>
    </div>
</nav>

<script>
    var menu = document.getElementById('menu');
    var hamburgerBtn = document.getElementById('hamburger-btn');
    var dropdownMenu = document.createElement('div');

    dropdownMenu.classList.add('dropdown-menu');

    menu.parentNode.appendChild(dropdownMenu);

    menu.addEventListener('click', function() {
        dropdownMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', function(event) {
        if (!menu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });

    hamburgerBtn.addEventListener('click', function() {
        menu.classList.toggle('hidden');
        dropdownMenu.classList.add('hidden');
    });
</script>

<style>
    body {
        background-color: #edf2f7;
    }

    .nav-link {
        font-weight: 500;
    }
</style>