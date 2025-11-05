<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My To-Do List</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Nunito:wght@400;600&display=swap" rel="stylesheet">

  <!-- Ganti font baru -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-100 min-h-screen font-[Nunito] text-rose-900">

  <!-- Header -->
  <header class="text-center py-10">
    <h1 class="text-5xl font-[Pacifico] drop-shadow">My To Do List 🧸</h1>
  </header>

  <!-- Form Tambah Todo -->
  <div class="flex justify-center mb-10">
    <form action="{{ route('todos.store') }}" method="POST" class="flex gap-3 items-center bg-white p-5 rounded-full shadow">
      @csrf
      <input type="text" name="name" placeholder="Judul todo..." required class="px-5 py-3 rounded-full border border-rose-300 focus:outline-none focus:ring-2 focus:ring-rose-400">
      <input type="text" name="description" placeholder="Deskripsi " class="px-5 py-3 rounded-full border border-rose-300 focus:outline-none focus:ring-2 focus:ring-rose-400">
      <button type="submit" class="bg-rose-600 text-white px-5 py-3 rounded-full hover:bg-rose-700 transition">Tambah</button>
    </form>
  </div>

  <!-- Daftar Todo -->
  <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-2xl p-6">
    <ul>
      @foreach($todos as $todo)
        <li class="border-b border-rose-200 py-4 animate-fadeSlide">
          <div class="flex justify-between items-start">
            <div>
              <h3 class="text-lg font-bold">{{ $todo->name }}</h3>
              @if($todo->description)
                <p class="text-sm text-rose-700 mt-1">{{ $todo->description }}</p>
              @endif
            </div>

            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="delete-btn bg-gray-300 hover:bg-red-400 text-white px-4 py-2 rounded-full transition transform hover:scale-110">
                🗑️
              </button>

            </form>
          </div>
        </li>


      @endforeach
    </ul>
  </div>
    <style>
    @keyframes fadeSlide {
      0% {
        opacity: 0;
        transform: translateY(-10px) scale(0.98);
      }
      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    .animate-fadeSlide {
      animation: fadeSlide 0.5s ease-in-out;
    }
    @keyframes fadeOut {
      0% {
        opacity: 1;
        transform: translateX(0);
      }
      100% {
        opacity: 0;
        transform: translateX(50px);
      }
    }

    .fade-out {
      animation: fadeOut 0.4s ease-in-out forwards;
    }

  </style>
  <script>
    document.querySelectorAll('.delete-btn').forEach(btn => {
      btn.addEventListener('click', e => {
        const li = e.target.closest('li');
        li.classList.add('fade-out');
        setTimeout(() => li.remove(), 400);
      });
    });
  </script>

</body>
</html>
