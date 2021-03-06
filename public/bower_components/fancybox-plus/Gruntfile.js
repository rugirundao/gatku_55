module.exports = function (grunt) {

    grunt.initConfig({

        // Import package manifest
        pkg: grunt.file.readJSON('package.json'),

        // Banner definitions
        meta: {
            banner: '/*\n' +
            ' *  <%= pkg.title || pkg.name %> - v<%= pkg.version %>\n' +
            ' *  <%= pkg.description %>\n' +
            ' *  <%= pkg.homepage %>\n' +
            ' *\n' +
            ' *  Made by <%= pkg.author.name %>\n' +
            ' *  Under <%= pkg.license %> License\n' +
            ' */\n'
        },

        // Concat definitions
        concat: {
            options: {
                banner: '<%= meta.banner %>'
            },
            dist: {
                src: ['src/jquery.fancybox-plus.js'],
                dest: 'dist/jquery.fancybox-plus.js'
            }
        },

        // Lint definitions
        jshint: {
            files: ['src/jquery.fancybox-plus.js'],
            options: {
                jshintrc: '.jshintrc'
            }
        },

        // JSCS definitions
        jscs: {
            src: 'src/*.js',
            options: {
                config: '.jscsrc',
                esnext: true, // If you use ES6 http://jscs.info/overview.html#esnext
                verbose: true, // If you need output with rule names http://jscs.info/overview.html#verbose
                requireCurlyBraces: ['if']
            }
        },

        // Minify definitions
        uglify: {
            my_target: {
                src: ['src/jquery.fancybox-plus.js'],
                dest: 'dist/jquery.fancybox-plus.min.js'
            },
            options: {
                banner: '<%= meta.banner %>'
            }
        },

        // watch for changes to source
        // Better than calling grunt a million times
        // (call 'grunt watch')
        watch: {
            files: ['src/*'],
            tasks: ['default']
        }

    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-jscs');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('build', ['concat', 'uglify']);
    grunt.registerTask('default', ['jshint', 'jscs', 'build']);
    grunt.registerTask('travis', ['default']);

};
