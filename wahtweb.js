[
  "http://localhost:5000",
  200,
  [
    [
      "Apache",
      [
        {
          regexp: ["Apache"],
          search: "headers[server]",
          name: "HTTP Server Header",
          regexp_compiled: "(?i-mx:^Apache)",
          certainty: 100,
        },
        {
          version: ["2.4.61"],
          search: "headers[server]",
          name: "HTTP Server Header",
          regexp_compiled: "(?i-mx:^Apache\\/([\\d\\.]+))",
          certainty: 100,
        },
      ],
    ],
    [
      "HTML5",
      [
        {
          regexp: ["<!DOCTYPE html>"],
          regexp_compiled: "(?i-mx:<!DOCTYPE html>)",
          certainty: 100,
        },
      ],
    ],
    [
      "HTTPServer",
      [
        { os: "Debian Linux", certainty: 100 },
        {
          name: "server string",
          string: "Apache/2.4.61 (Debian)",
          certainty: 100,
        },
      ],
    ],
    ["IP", [{ string: "::1", certainty: 100 }]],
    [
      "MetaGenerator",
      [
        {
          string: ["WordPress 6.6.1"],
          regexp_compiled:
            '(?i-mx:<meta[^>=]+name[\\s]*=[\\s]*["|\']?generator["|\']?[^>=]+content[\\s]*=[\\s]*"([^"\'>]+)")',
          certainty: 100,
        },
      ],
    ],
    [
      "PHP",
      [
        {
          version: ["8.2.22"],
          search: "headers[x-powered-by]",
          regexp_compiled: "(?-mix:[^\\r^\\n]*PHP\\/([^\\s^\\r^\\n]+))",
          certainty: 100,
        },
      ],
    ],
    [
      "Script",
      [
        {
          regexp: [" ", ">"],
          regexp_compiled: "(?i-mx:<script(\\s|>))",
          certainty: 100,
        },
        {
          string: ["importmap", "module"],
          offset: 1,
          regexp_compiled:
            "(?-mix:<script[^>]+(language|type)\\s*=\\s*['\"]?([^'\"\\s]+)['\"]?)",
          certainty: 100,
        },
      ],
    ],
    ["Title", [{ name: "page title", string: "admin", certainty: 100 }]],
    ["UncommonHeaders", [{ name: "headers", string: "link", certainty: 100 }]],
    [
      "WordPress",
      [
        {
          regexp: [
            "\"><style id='wp-fonts-local'>\n@font-face{font-family:Inter;font-style:normal;font-weight:300 900;font-display:fallback;src:url('http://localhost:5000/wp-content/themes/twentytwentyfour/assets/fonts/inter/Inter-VariableFont_slnt,wght.woff2') format('woff2');font-stretch:normal;}\n@font-face{font-family:Cardo;font-style:normal;font-weight:400;font-display:fallback;src:url('http://localhost:5000/wp-content/themes/twentytwentyfour/assets/fonts/cardo/cardo_normal_400.woff2') format('woff2');}\n@font-face{font-family:Cardo;font-style:italic;font-weight:400;font-display:fallback;src:url('http://localhost:5000/wp-content/themes/twentytwentyfour/assets/fonts/cardo/cardo_italic_400.woff2') format('woff2');}\n@font-face{font-family:Cardo;font-style:normal;font-weight:700;font-display:fallback;src:url('http://localhost:5000/wp-content/themes/twentytwentyfour/assets/fonts/cardo/cardo_normal_700.woff2') format('woff2');}\n</style>\n</head>\n\n<body class=\"",
            '"http://localhost:5000/wp-content/themes/twentytwentyfour/assets/images/building-exterior.webp"',
            '"http://localhost:5000/wp-content/themes/twentytwentyfour/assets/images/tourist-and-building.webp"',
            '"http://localhost:5000/wp-content/themes/twentytwentyfour/assets/images/windows.webp"',
          ],
          name: "wp-content",
          certainty: 75,
          regexp_compiled: '(?-mix:"[^"]+\\/wp-content\\/[^"]+")',
        },
        {
          version: ["6.6.1"],
          regexp_compiled:
            '(?-mix:<meta name="generator" content="WordPress ([0-9\\.]+)")',
          certainty: 100,
        },
        { name: "Relative /wp-content/ link", certainty: 100 },
        { name: "Relative /wp-includes/ link", certainty: 100 },
      ],
    ],
    [
      "X-Powered-By",
      [{ name: "x-powered-by string", string: "PHP/8.2.22", certainty: 100 }],
    ],
  ],
];
