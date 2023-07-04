<?php
// class GoogleImageModel
// {
//     public function getImageUrl($searchQuery)
//     {
//         // Effectuer la requête à l'API de recherche d'images de Google
//         $searchQuery = urlencode($searchQuery);
//         $searchUrl = "https://www.googleapis.com/customsearch/v1?key=AIzaSyAuS0Ur8sz4L53lUbu9b-kBYA8JaEBFJNo&cx=155ebefcc8fae4f26&q={$searchQuery}&searchType=image";

//         $response = file_get_contents($searchUrl);

//         // Gérer la réponse
//         if ($response !== false) {
//             // Analyser la réponse JSON
//             $responseData = json_decode($response, true);

//             // Vérifier si une image correspond au nom de l'article
//             foreach ($responseData['items'] as $item) {
//                 if (stripos($item['title'], $searchQuery) !== false) {
//                     // Utiliser l'URL de l'image correspondante
//                     $imageUrl = $item['link'];
//                     return $imageUrl;
//                 }
//             }
//         }

//         return null; // Aucune correspondance d'image trouvée
//     }
// }
?>