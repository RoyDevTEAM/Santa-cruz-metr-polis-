<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .input-group {
            position: relative;
            margin-bottom: 2rem;
        }
        
        .input-group input, 
        .input-group textarea {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
            padding-left: 40px;
        }
        
        .input-group input:focus, 
        .input-group textarea:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.2);
        }
        
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            transition: all 0.3s ease;
        }
        
        .input-group input:focus ~ i {
            color: #3b82f6;
        }
        
        .testimonial-card {
            transition: transform 0.3s ease;
            cursor: pointer;
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
        }
        
        .animate-shake {
            animation: shake 0.5s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
    </style>
</head>
<body class="bg-gray-100">
    <?php include_once 'templates/header.php'; ?>

    <div class="container mx-auto px-4 py-10">
        <?php if(isset($_SESSION['message'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <?= $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>

        <h1 class="text-4xl font-bold text-center mb-12 text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-white">
    Contáctanos
</h1>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white p-8 rounded-2xl shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-600 to-emerald-100"></div>
                    
                    <div class="absolute bottom-0 right-0 opacity-10">
                        <img src="https://img.icons8.com/clouds/300/000000/contact-card.png" alt="Contact" class="w-64 h-64">
                    </div>

                    <form action="send_email.php" method="POST" enctype="multipart/form-data" class="space-y-6 relative">
                        <div class="input-group">
                            <i class="fas fa-user"></i>
                            <input type="text" id="name" name="name" required 
                                   class="mt-1 p-3 w-full border-2 rounded-lg shadow-sm focus:outline-none"
                                   placeholder="Nombre completo">
                        </div>

                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" required 
                                   class="mt-1 p-3 w-full border-2 rounded-lg shadow-sm focus:outline-none"
                                   placeholder="correo@ejemplo.com">
                        </div>

                        <div class="input-group">
                            <i class="fas fa-phone"></i>
                            <input type="tel" id="phone" name="phone" 
                                   class="mt-1 p-3 w-full border-2 rounded-lg shadow-sm focus:outline-none"
                                   placeholder="Teléfono (opcional)">
                        </div>

                        <div class="input-group">
                            <i class="fas fa-comment-dots"></i>
                            <textarea id="message" name="message" rows="4" required 
                                      class="mt-1 p-3 w-full border-2 rounded-lg shadow-sm focus:outline-none"
                                      placeholder="Escribe tu mensaje..."></textarea>
                        </div>

                        <div class="input-group">
                            <label class="flex items-center space-x-3 p-3 border-2 rounded-lg hover:bg-blue-50 cursor-pointer">
                                <i class="fas fa-paperclip text-blue-500"></i>
                                <span class="text-gray-600">Adjuntar archivos</span>
                                <input type="file" id="attachment" name="attachment[]" multiple class="hidden">
                            </label>
                        </div>

                        <button type="submit" 
    class="w-full px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-100 text-white rounded-lg 
           hover:from-green-700 hover:to-emerald-200 transition-all duration-300 transform 
           hover:scale-105 shadow-lg">
    Enviar Mensaje <i class="fas fa-paper-plane ml-2"></i>
</button>
                    </form>
                </div>
            </div>
            
            <div class="relative">
                <h2 class="text-2xl font-bold mb-4">Lo que dicen nuestros clientes✈🌍</h2>
                <div class="space-y-4 relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-100 rounded-full opacity-50"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-purple-100 rounded-full opacity-50"></div>
                    
                    <div class="testimonial-card p-6 rounded-xl border border-blue-50 relative">
                        <div class="absolute top-0 right-0 mt-2 mr-2 text-yellow-400">
                            <i class="fas fa-quote-right opacity-50"></i>
                        </div>
                        <p class="text-gray-700 italic">"Excelente servicio y atención al cliente. ¡Recomendado!"</p>
                        <div class="mt-4 flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center">
                                <span class="text-white font-bold">A</span>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Sofia Lopez</p>
                                <p class="text-sm text-gray-500">Cliente satisfecha🏨</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-card p-6 rounded-xl border border-blue-50 relative">
                        <div class="absolute top-0 right-0 mt-2 mr-2 text-yellow-400">
                            <i class="fas fa-quote-right opacity-50"></i>
                        </div>
                        <p class="text-gray-700 italic">"Una experiencia inolvidable, todo fue perfecto."</p>
                        <div class="mt-4 flex items-center">
                            <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center">
                                <span class="text-white font-bold">M</span>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Carla Gutierrez</p>
                                <p class="text-sm text-gray-500">Viajera frecuente✈</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-card p-6 rounded-xl border border-blue-50 relative">
                        <div class="absolute top-0 right-0 mt-2 mr-2 text-yellow-400">
                            <i class="fas fa-quote-right opacity-50"></i>
                        </div>
                        <p class="text-gray-700 italic">"Muy satisfecho con la rapidez y eficacia."</p>
                        <div class="mt-4 flex items-center">
                            <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center">
                                <span class="text-white font-bold">C</span>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Juan Carlo Ramirez</p>
                                <p class="text-sm text-gray-500">Ingeniero🧑‍💻</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'templates/header.php'; ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animación de hover para los testimonios
        document.querySelectorAll('.testimonial-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Validación en tiempo real
        const inputs = document.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                if (input.checkValidity()) {
                    input.classList.add('border-green-500');
                    input.classList.remove('border-red-500');
                } else {
                    input.classList.add('border-red-500');
                    input.classList.remove('border-green-500');
                }
            });
        });

        // Efecto al enviar el formulario
        const form = document.querySelector('form');
        form.addEventListener('submit', (e) => {
            if (!form.checkValidity()) {
                e.preventDefault();
                form.classList.add('animate-shake');
                setTimeout(() => form.classList.remove('animate-shake'), 500);
            }
        });

        // Animación para el icono de adjuntar archivo
        const fileInput = document.querySelector('#attachment');
        const fileLabel = document.querySelector('label[for="attachment"]');
        
        fileInput.addEventListener('change', () => {
            if(fileInput.files.length > 0) {
                fileLabel.classList.add('border-green-500', 'bg-green-50');
                fileLabel.querySelector('i').classList.add('text-green-600');
            } else {
                fileLabel.classList.remove('border-green-500', 'bg-green-50');
                fileLabel.querySelector('i').classList.remove('text-green-600');
            }
        });
    });
    </script>
</body>
</html>