module.exports = {
   env: {
      "jest": true,
      "browser": true,
      "node": true
   },
   // Standard JavaScript Style Guide
   // extends: ["standard", "plugin:prettier/recommended"],
   // Airbnb JavaScript Style Guide
   extends: ["airbnb-base", "plugin:prettier/recommended"],
   // Google JavaScript Style Guide
   // extends: ["google", "plugin:prettier/recommended"],

   rules: {
      "no-new": 0,
      'no-plusplus': 0,
      'func-names': 0,
      "prettier/prettier": ["error", { "singleQuote": true, "semi": false }]
   }
}