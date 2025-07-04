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

  <div class="lab-list" id="labListContainer"></div>

  <script>
    const labs = [
      {
        title: "Lab 1: Diffusion in Agar Cubes",
        purpose: "Demonstrate how surface area to volume ratio affects diffusion.",
        procedure: `Prepare agar cubes containing pH indicator (e.g., phenolphthalein) and NaOH.\nCut cubes into different sizes.\nPlace them in vinegar (acidic solution).\nObserve color change from pink to clear as acid diffuses in.\nMeasure depth of diffusion and analyze effect of cube size.`,
        video: "https://www.youtube.com/embed/sample1"
      },
      {
        title: "Lab 2: Investigating Enzyme Temperature Sensitivity",
        purpose: "Determine how temperature affects enzyme catalysis.",
        procedure: `Prepare solutions of catalase (e.g., from potato).\nSet up water baths at different temperatures (0°C–60°C).\nAdd hydrogen peroxide and catalase in test tubes.\nMeasure height or rate of bubble formation.\nGraph enzyme activity vs. temperature.`,
        video: "https://www.youtube.com/embed/sample2"
      },
      {
        title: "Lab 3: Virtual Dissection of a Frog",
        purpose: "Identify internal organs and body systems of a vertebrate.",
        procedure: `Use an online frog dissection simulation (e.g., McGraw-Hill).\nFollow instructions to expose and identify organs.\nLabel digestive, circulatory, and reproductive structures.\nComplete guided questions based on virtual observations.`,
        video: "https://www.youtube.com/embed/sample3"
      },
      {
        title: "Lab 4: Investigating pH Effect on Enzyme Activity",
        purpose: "Explore how pH influences enzymatic function.",
        procedure: `Prepare buffered solutions at different pH levels.\nMix enzyme (e.g., amylase) with starch in each.\nUse iodine to test starch breakdown over time.\nRecord time taken for solution to stop changing color.\nDetermine optimal pH for activity.`,
        video: "https://www.youtube.com/embed/sample4"
      },
      {
        title: "Lab 5: Population Sampling with Quadrats",
        purpose: "Estimate population density in an ecosystem.",
        procedure: `Select field site and mark area with tape.\nRandomly place quadrats (square frames) at intervals.\nCount organisms (e.g., grass, insects) in each quadrat.\nCalculate average number per quadrat.\nMultiply to estimate total population in area.`,
        video: "https://www.youtube.com/embed/sample5"
      },
      {
        title: "Lab 6: Heart Rate and Exercise",
        purpose: "Study how physical activity affects heart rate.",
        procedure: `Measure resting heart rate.\nPerform 2 minutes of jumping jacks or running in place.\nMeasure pulse immediately, then at 1-min intervals for 5 minutes.\nGraph heart rate over recovery time.\nCompare between individuals or fitness levels.`,
        video: "https://www.youtube.com/embed/sample6"
      },
      {
        title: "Lab 7: Investigating Tropism with Bean Seedlings",
        purpose: "Examine how plants grow in response to stimuli.",
        procedure: `Germinate bean seeds in moist paper towels.\nPlace seedlings in boxes with light from one direction.\nObserve growth direction (phototropism).\nRepeat with gravity manipulation for geotropism.\nRecord and photograph changes daily.`,
        video: "https://www.youtube.com/embed/sample7"
      },
      {
        title: "Lab 8: CO₂ Levels and Photosynthesis",
        purpose: "Analyze the role of carbon dioxide in photosynthesis.",
        procedure: `Submerge elodea (aquatic plant) in water with bromothymol blue.\nBlow CO₂ into the solution to acidify it (color turns yellow).\nPlace in light and observe color change back to blue.\nUse dark control to compare.\nInfer photosynthetic carbon uptake.`,
        video: "https://www.youtube.com/embed/sample8"
      },
      {
        title: "Lab 9: Testing for Vitamin C in Juices",
        purpose: "Determine vitamin C content in various drinks.",
        procedure: `Use iodine solution and starch as indicator.\nTitrate fruit juice into the indicator solution drop by drop.\nCount number of drops until blue color disappears.\nCompare results across samples.\nInfer vitamin C concentration based on volume needed.`,
        video: "https://www.youtube.com/embed/sample9"
      },
      {
        title: "Lab 10: Modeling Meiosis with Beads",
        purpose: "Visualize chromosome behavior during meiosis.",
        procedure: `Use colored beads and strings to represent chromosomes.\nSimulate stages: prophase I, metaphase I, anaphase I, telophase I, etc.\nInclude crossing over with bead exchanges.\nObserve gametes at end of meiosis II.\nDiscuss genetic variation outcomes.`,
        video: "https://www.youtube.com/embed/sample10"
      }
    ];

    const labListContainer = document.getElementById('labListContainer');

    labs.forEach((lab, index) => {
      const labEntry = document.createElement('div');
      labEntry.className = 'lab-entry';

      const labHeader = document.createElement('div');
      labHeader.className = 'lab-header';
      labHeader.setAttribute('onclick', 'toggleLab(this)');
      labHeader.innerHTML = `<span class="arrow">▶</span> ${lab.title}`;

      const labContent = document.createElement('div');
      labContent.className = 'lab-content';

      const labText = document.createElement('div');
      labText.className = 'lab-text';
      labText.innerHTML = `<strong>Purpose:</strong> ${lab.purpose}<br><br><strong>Procedure:</strong><br>${lab.procedure.replace(/\n/g, '<br>')}`;

      const labVideo = document.createElement('div');
      labVideo.className = 'lab-video';
      labVideo.innerHTML = `<iframe loading="lazy" src="${lab.video}" allowfullscreen></iframe>`;

      labContent.appendChild(labText);
      labContent.appendChild(labVideo);

      labEntry.appendChild(labHeader);
      labEntry.appendChild(labContent);

      labListContainer.appendChild(labEntry);
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
