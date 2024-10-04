// Function to add click toggling to each section
// document.addEventListener("DOMContentLoaded", function () {
//     // Get all section list items
//     const sections = document.querySelectorAll("li[id^='section-']");

//     sections.forEach((section) => {
//         // Add click event listener for each section
//         section.addEventListener("click", function () {
//             // Get the corresponding items div
//             const sectionId = section.getAttribute("id").split("-")[1]; // Extract the section ID
//             const menSectionItems = document.getElementById(
//                 "items-" + sectionId
//             );

//             // Toggle visibility class
//             if (menSectionItems.classList.contains("visibility")) {
//                 menSectionItems.classList.remove("visibility");
//             } else {
//                 menSectionItems.classList.add("visibility");
//             }
//         });
//     });
// });
// ChatGPT
document.addEventListener("DOMContentLoaded", function () {
    // Get all section list items
    const sections = document.querySelectorAll("li[id^='section-']");

    sections.forEach((section) => {
        // Add click event listener for each section
        section.addEventListener("click", function () {
            // Get the corresponding items div
            const sectionId = section.getAttribute("id").split("-")[1]; // Extract the section ID
            const sectionItems = document.querySelector(
                `.${section.classList[0]}`
            );

            // Toggle visibility class
            if (sectionItems.classList.contains("visibility")) {
                sectionItems.classList.remove("visibility");
            } else {
                sectionItems.classList.add("visibility");
            }
        });
    });
});

// const men_section = document.querySelector(".men");
// const women_section = document.querySelector(".women");
// const kids_section = document.querySelector(".kids");
// const home_section = document.querySelector(".homeliving");
// const beauty_section = document.querySelector(".beauty");

// const profile_section = document.querySelector(".profile"); // Usman Added Section

// const men_section_items = document.querySelector(".men-section-items");
// const women_section_items = document.querySelector(".women-section-items");
// const kids_section_items = document.querySelector(".kids-section-items");
// const home_section_items = document.querySelector(".home-section-items");
// const beauty_section_items = document.querySelector(".beauty-section-items");

// const profile_section_items = document.querySelector(".profile-section-items"); // Usman Added Section

// const container_ele = document.querySelector(".container");
// var bodyele = document.getElementsByTagName("BODY");

// // First Logic

// // Add click event to men_section
// men_section.onclick = () => {
//     // Check if men_section_items has the class 'visibility'
//     if (men_section_items.classList.contains("visibility")) {
//         // If it does, remove the class to show the items
//         men_section_items.classList.remove("visibility");
//     } else {
//         // If it doesn't, add the class to hide the items
//         men_section_items.classList.add("visibility");
//     }
// };

// // men_section.onmouseover = () => {
// //     men_section_items.classList.remove("visibility");
// // };
// // men_section.onmouseout = () => {
// //     men_section_items.classList.add("visibility");
// // }; /* men section ends here */

// women_section.onmouseover = () => {
//     women_section_items.classList.remove("visibility");
// };
// women_section.onmouseout = () => {
//     women_section_items.classList.add("visibility");
// }; /* women section ends here */

// kids_section.onmouseover = () => {
//     kids_section_items.classList.remove("visibility");
// };
// kids_section.onmouseout = () => {
//     kids_section_items.classList.add("visibility");
// }; /* kids section ends here */

// home_section.onmouseover = () => {
//     home_section_items.classList.remove("visibility");
// };
// home_section.onmouseout = () => {
//     home_section_items.classList.add("visibility");
// }; /* home and living section ends here */

// beauty_section.onmouseover = () => {
//     beauty_section_items.classList.remove("visibility");
// };
// beauty_section.onmouseout = () => {
//     beauty_section_items.classList.add("visibility");
// }; /* beauty section ends here */

// profile_section.onmouseover = () => {
//     profile_section_items.classList.remove("visibility");
// };
// profile_section.onmouseout = () => {
//     profile_section_items.classList.add("visibility");
// }; /* profile section ends here */

// // Second Logic
// // men_section_items.onmouseover = () => {
// //     men_section_items.classList.remove("visibility");
// // };
// // men_section_items.onmouseout = () => {
// //     men_section_items.classList.add("visibility");
// // }; /* men section ends here */

// women_section_items.onmouseover = () => {
//     women_section_items.classList.remove("visibility");
// };
// women_section_items.onmouseout = () => {
//     women_section_items.classList.add("visibility");
// }; /* women section ends here */

// kids_section_items.onmouseover = () => {
//     kids_section_items.classList.remove("visibility");
// };
// kids_section_items.onmouseout = () => {
//     kids_section_items.classList.add("visibility");
// }; /* kids section ends here */

// home_section_items.onmouseover = () => {
//     home_section_items.classList.remove("visibility");
// };
// home_section_items.onmouseout = () => {
//     home_section_items.classList.add("visibility");
// }; /* home and living section ends here */

// beauty_section_items.onmouseover = () => {
//     beauty_section_items.classList.remove("visibility");
// };
// beauty_section_items.onmouseout = () => {
//     beauty_section_items.classList.add("visibility");
// }; /* beauty section ends here */

// profile_section_items.onmouseover = () => {
//     profile_section_items.classList.remove("visibility");
// };
// profile_section_items.onmouseout = () => {
//     profile_section_items.classList.add("visibility");
// }; /* profile section ends here */
