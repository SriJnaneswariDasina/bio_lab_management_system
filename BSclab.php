<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Evergreen Ridge University</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center center;
      background-attachment: fixed;
    }

    .sidebar {
      background: -webkit-linear-gradient(rgba(19, 134, 117, 0.73), #ac873624);
      width: 80px;
      color: white;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
      gap: 30px;
      position: fixed;
    }

    .sidebar a {
      color: white;
      font-size: 24px;
      text-decoration: none;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .sidebar a:hover {
      color: #b7e4c7;
    }

    .label {
      font-size: 11px;
      color: white;
      text-align: center;
      margin-top: 5px;
    }

    .main {
      margin-left: 100px;
      padding: 24px;
    }

    .title {
      display: flex;
      align-items: center;
      gap: 20px;
      padding: 10px 20px;
      background: -webkit-linear-gradient(#ac873624, rgba(19, 134, 117, 0.6));
      margin-left: 80px;
    }

    .title .logo {
      width: 50px;
      height: 50px;
    }

    a {
      font-size: 24px;
      color: rgb(0, 0, 0);
      text-decoration: initial;
    }

    a:hover {
      color: white;
    }

    .video-background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }

    .video-background video {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }

    .lab-list {
      margin-left: 120px;
      display: flex;
      flex-direction: column;
      gap: 15px;
      padding: 20px;
    }

    .lab-entry {
      background-color: #1e1e2f;
      border-radius: 10px;
      padding: 15px;
      color: white;
    }

    .lab-header {
      font-size: 1.2em;
      font-weight: bold;
      cursor: pointer;
    }

    .lab-header .arrow {
      display: inline-block;
      margin-right: 8px;
      border: 1px solid white;
      border-radius: 3px;
      padding: 0 5px;
    }

    .lab-content {
      display: none;
      padding-top: 10px;
      flex-direction: row;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
    }

    .lab-text {
      flex: 1 1 60%;
    }

    .lab-video {
      flex: 1 1 35%;
      display: flex;
      justify-content: flex-end;
    }

    .lab-video iframe {
      width: 100%;
      height: 100%;
      max-width: 320px;
      aspect-ratio: 16 / 9;
      border: none;
    }
  </style>
</head>
<body>
  <div class="video-background">
    <video id="vid" autoplay muted loop>
      <source src="images/3191420-uhd_3840_2160_25fps.mp4" type="video/mp4">
    </video>
  </div>

  <div class="sidebar">
    <a href="students.php" title="Manage Students">
      <i class="fas fa-user-graduate"></i>
      <div class="label">Students</div>
    </a>
    <a href="lab.html" title="Lab Components">
      <i class="fas fa-microscope"></i>
      <div class="label">Lab</div>
    </a>
    <a href="admintimetable.php" title="Edit Timetable">
      <i class="fas fa-calendar-alt"></i>
      <div class="label">Timetable</div>
    </a>
  </div>

  <div class="title">
    <img class="logo" src="images/logo.png" alt="Logo">
    <h1><a href="#">Evergreen Ridge University</a></h1>
  </div>

  <div class="lab-list" id="labList"></div>

  <script>
    const labs = [
      {
        title: "Lab 1: Gram Staining of Bacteria",
        video: "sxa46xKfIOY",
        purpose: "Differentiate between Gram-positive and Gram-negative bacteria.",
        procedure: `Use a sterile loop to transfer a drop of bacterial culture onto a clean glass slide.<br>
        Spread the sample into a thin smear and air dry.<br>
        Heat-fix the slide by passing it quickly through a flame.<br>
        Flood the slide with crystal violet for 1 minute.<br>
        Rinse gently with water.<br>
        Flood with iodine (mordant) for 1 minute.<br>
        Rinse with water.<br>
        Decolorize with alcohol (95% ethanol) for 10–20 seconds.<br>
        Immediately rinse with water.<br>
        Counterstain with safranin for 1 minute.<br>
        Rinse and blot dry with paper towel.<br>
        Observe under oil immersion lens (100x objective) using a microscope.`
      },
      {
        title: "Lab 2: Plant Transpiration Rate Measurement",
        video: "FWxh28CTEcM",
        purpose: "Measure water loss from plants.",
        procedure: `Cut a leafy twig underwater to avoid air entering the xylem.<br>
        Insert the twig into a water-filled potometer and seal all joints with Vaseline.<br>
        Introduce a small air bubble into the capillary tube.<br>
        Start the stopwatch and measure the distance the bubble travels over a set time.<br>
        Repeat under different conditions: light, wind, humidity, temperature.<br>
        Record and calculate transpiration rate (e.g., mm/min).`
      },
      {
        title: "Lab 3: DNA Extraction (Strawberries/Bananas)",
        video: "W1DVEtzrl9g",
        purpose: "Extract visible DNA using household reagents.",
        procedure: `Mash strawberries/bananas in a ziplock bag or use a blender.<br>
        Mix a solution of dish soap + salt + water (DNA extraction buffer).<br>
        Add buffer to the mashed fruit and mix well.<br>
        Filter the mixture through cheesecloth/coffee filter into a beaker.<br>
        Add chilled rubbing alcohol slowly down the side of the container to form a layer.<br>
        Let sit for a few minutes. DNA will appear as white, stringy precipitate at the interface.<br>
        Use a pipette or stirring rod to collect the DNA strands.`
      },
      {
        title: "Lab 4: Enzyme Activity (Catalase and H₂O₂)",
        video: "3PYdMaClUmw",
        purpose: "Investigate enzyme activity by observing oxygen release.",
        procedure: `Cut potato or liver into small cubes.<br>
        Add 10 mL of hydrogen peroxide (3–6%) to a beaker or test tube.<br>
        Add the tissue sample and start the stopwatch.<br>
        Observe and measure the amount of foam produced.<br>
        Vary conditions: temperature (using water bath), pH, enzyme concentration.<br>
        Record time and foam height for each condition.`
      },
      {
        title: "Lab 5: Photosynthesis Rate Measurement",
        video: "id0aO_OdFwA",
        purpose: "Measure photosynthesis via oxygen output.",
        procedure: `Place Elodea (pondweed) in a beaker filled with sodium bicarbonate solution (provides CO₂).<br>
        Cut the stem underwater and orient the cut end upward.<br>
        Place a gas collection tube or count oxygen bubbles released.<br>
        Shine a lamp at a fixed distance.<br>
        Start the stopwatch and count bubbles for a set time.<br>
        Repeat with different light intensities or wavelengths.<br>
        Record results and graph rate vs. light intensity.`
      },
      {
        title: "Lab 6: Diffusion/Osmosis with Dialysis Tubing",
        video: "2CNGe3jMej0",
        purpose: "Model selective permeability of cell membranes.",
        procedure: `Soak dialysis tubing in water to soften it.<br>
        Tie one end, fill it with glucose/starch solution, then tie the other end.<br>
        Place the tubing in a beaker with water + iodine.<br>
        Leave for 30–60 minutes.<br>
        Observe color change in tubing and surrounding solution.<br>
        Test external solution for glucose using Benedict’s test (heat required).<br><br>
        <strong>Expected Results:</strong><br>
        Iodine enters tubing: turns blue-black (indicates starch inside).<br>
        Glucose diffuses out: Benedict’s solution turns orange/red upon heating.`
      },
      {
        title: "Lab 7: Aseptic Technique and Microbial Culture",
        video: "bRadiLXkqoU",
        purpose: "Grow and handle microbes safely.",
        procedure: `Sterilize inoculation loop by flaming until red-hot.<br>
        Cool the loop, then dip into bacterial culture.<br>
        Streak bacteria onto nutrient agar plate using the quadrant method.<br>
        Flame the loop between quadrants.<br>
        Seal the Petri dish with tape (not completely airtight).<br>
        Label and place in incubator at 25–30°C for 24–48 hours.<br>
        Observe colony growth and morphology.`
      },
      {
        title: "Lab 8: Effect of Exercise on Heart Rate",
        video: "U0rnucxG9hE",
        purpose: "Measure physiological changes due to physical activity.",
        procedure: `Have a volunteer rest for 5 minutes.<br>
        Measure resting heart rate using pulse oximeter or stethoscope for 1 minute.<br>
        Perform light exercise (e.g., jumping jacks, jogging in place) for 1–3 minutes.<br>
        Immediately measure heart rate post-exercise and every minute until baseline is reached.<br>
        Plot recovery curve using graph paper/software.`
      },
      {
        title: "Lab 9: Microscopy of Onion or Cheek Cells",
        video: "EUXmC84aRFQ",
        purpose: "View cell structures under microscope.",
        procedure: `Peel a thin layer of onion epidermis or collect cheek cells using a cotton swab.<br>
        Place sample on a slide with a drop of water or stain (methylene blue for cheek cells, iodine for onion).<br>
        Add a coverslip slowly at an angle to avoid air bubbles.<br>
        View under microscope, starting at low magnification (4x), then 10x, then 40x.<br>
        Sketch and label: nucleus, cell wall, cytoplasm, etc.`
      },
      {
        title: "Lab 10: Antibiotic Sensitivity Test (Kirby-Bauer Method)",
        video: "4eLcjk3Iv9Y",
        purpose: "Assess bacterial resistance to antibiotics.",
        procedure: `Use a sterile swab to spread bacterial culture evenly over an agar plate.<br>
        Place antibiotic discs (or soaked filter paper) on the surface with sterile forceps.<br>
        Label plate and incubate for 24–48 hours at 25–37°C.<br>
        Measure the zones of inhibition (clear areas around discs) using a ruler.<br>
        Larger zones = more effective antibiotic.`
      }
    ];

    const container = document.getElementById("labList");

    labs.forEach((lab) => {
      const labDiv = document.createElement("div");
      labDiv.className = "lab-entry";
      labDiv.innerHTML = `
        <div class="lab-header" onclick="toggleLab(this)">
          <span class="arrow">▶</span> ${lab.title}
        </div>
        <div class="lab-content">
          <div class="lab-text">
            <strong>Purpose:</strong> ${lab.purpose}<br><br>
            <strong>Procedure:</strong><br>
            ${lab.procedure}
          </div>
          <div class="lab-video">
            <iframe loading="lazy" src="https://www.youtube.com/embed/${lab.video}" allowfullscreen></iframe>
          </div>
        </div>
      `;
      container.appendChild(labDiv);
    });

    function toggleLab(el) {
      const content = el.nextElementSibling;
      const arrow = el.querySelector('.arrow');
      const isOpen = content.style.display === 'flex';
      content.style.display = isOpen ? 'none' : 'flex';
      arrow.innerHTML = isOpen ? '▶' : '▼';
    }
  </script>
</body>
</html>
