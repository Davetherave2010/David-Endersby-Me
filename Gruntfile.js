module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
        sourceMap: true,
        sourceMapName: 'build/<%= pkg.name %>-sourcemap.map'
      },
      build: {
        src: 'js/**/*.js',
        dest: 'build/<%= pkg.name %>.min.js'
      }
    },
    sass: {                              // Task
      dist: {                            // Target
        options: {                       // Target options
          style: 'compressed'
        },
        files: {                         // Dictionary of files
          'build/<%= pkg.name %>.min.css': 'css/sass/main.scss',       // 'destination': 'source'
        }
      }
    },
    watch: {
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