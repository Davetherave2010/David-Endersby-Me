module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // Project configuration.
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
        sourceMap: true,
        sourceMapName: 'build/<%= pkg.name %>-sourcemap.map',
        preserveComments: false,
        compress: true,
        mangle: false
      },
      core_files:{
        files: {
          'build/js/core.min.js': ['js/core/*.js']
        }
      },
      other_files:{
        files:[{
          expand: true,
          cwd: 'js',
          src: '*.js',
          dest: 'build/js',
          ext: '.min.js'
        }]
      }
    },
    sass: {                              // Task
      dist: {                            // Target
        options: {                       // Target options
          style: 'compressed'
        },
        files: {                         // Dictionary of files
          'build/css/<%= pkg.name %>.min.css': 'css/sass/main.scss'       // 'destination': 'source'
        }
      }
    },
    watch: {
      php: {
        files: '*.php',
        options: {
          livereload: true,
        },
      },
      css: {
        files: 'css/sass/**/*.scss',
        tasks: ['sass'],
        options: {
          livereload: true,
        },
      },
      js: {
        files: 'js/**/*.js',
        tasks: ['uglify'],
        options: {
          livereload: true,
        },
      },
    },
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default', ['uglify', 'sass', 'watch']);

};